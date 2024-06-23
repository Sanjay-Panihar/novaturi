<?php

namespace App\Http\Controllers\Front;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Vendor;
use App\Http\Controllers\PhonePecontroller;
use App\Models\ProductsAttribute;
use App\Models\DeliveryAddress;
use App\Models\OrdersProduct;
use App\Models\Order;
use App\Models\Wishlist;
use Auth;
use Session;
use DB;

class ProductsController extends Controller
{
    public function listing(Request $request) {
        $url = Route::getFacadeRoot()->current()->uri();
        $categoryCount = Category::where(['url' => $url, 'category_status' => 1])->count();
    
        if ($categoryCount > 0) {
            $categoryDetails = Category::categoryDetails($url);
            $productsQuery = Product::whereIn('category_id', $categoryDetails['catIds'])
                                    ->where('product_status', 1);
    
            // Check for search query
            if ($request->has('query') && !empty($request->input('query'))) {
                $query = $request->input('query');
                $productsQuery->where(function($q) use ($query) {
                    $q->where('name', 'LIKE', "%{$query}%")
                      ->orWhere('description', 'LIKE', "%{$query}%")
                      ->orWhere('shortdescription', 'LIKE', "%{$query}%")
                      ->orWhere('description', 'LIKE', "%{$query}%")
                      ->orWhere('description', 'LIKE', "%{$query}%")
                      ->orWhere('description', 'LIKE', "%{$query}%");
                });
            }
    
            // Sorting
            if ($request->has('sort') && !empty($request->input('sort'))) {
                if ($request->input('sort') == "product_latest") {
                    $productsQuery->orderBy('products.id', 'DESC');
                }
            }
    
            $categoryProducts = $productsQuery->paginate(3);
    
            return view('shop-grid')->with(compact('categoryDetails', 'categoryProducts'));
        } else {
            abort(404);
        }
    }
    
    public function detail($id){
        $productDetails = Product::with('section','category','attributes','images')->find($id)->toArray();
        $categoryDetails = category::categoryDetails($productDetails['category']['url']);
        $productVendors = $productDetails->vendors;


        //dd($productVendors); die;
        $groupProducts = array();
        if (!empty($productDetails['group_code'])) {
            $groupProducts = Product::select('id','product_image')->where('id','!=',$id)->where([
                'group_code'=>$productDetails['group_code'],'product_status'=>1])->get()->toArray();
        //dd($groupProducts);
        }
        $totalStock = ProductsAttribute::where('product_id',$id)->sum('stocks');

        

        return view('shopdetails')->with(compact('productDetails','categoryDetails','totalStock','groupProducts','productVendors'));
    }

    public function getproductprice(Request $request){
    if ($request->ajax()) {
        $data = $request->all();

        $getDiscountAttributePrice = Product::getDiscountAttributePrice(
            $data['product_id'],
            $data['size']
        );

        return $getDiscountAttributePrice;
    }
   }


    public function cartadd(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
             
        }
        $session_id = Session::get('session_id');
        if (empty($session_id)) {
            $session_id = Session::getId();
            Session::put('session_id',$session_id);
        }
        ///////////////////check product if already exixtes in the user cart////////////////////////////////

        if(Auth::check()){
            /////user is logged in
            $user_id = Auth::user()->id;
            $countProducts = Cart::Where(['product_id'=>$data['product_id'],'size'=>$data['size'],'user_id'=>$user_id])->count();

        }else{
            ///////////user is not logged in
            $user_id = 0;
            $countProducts = Cart::Where(['product_id'=>$data['product_id'],'size'=>$data['size'],'session_id'=>$session_id])->count();
        }


       ///////////////////////////////////////////////////////////////////////////////////////////////////////
        $item = new Cart;
        $item->session_id = $session_id;
        $item->user_id = $user_id;
        $item->product_id = $data['product_id'];
        $item->size = $data['size'];
        $item->quantity = $data['quantity'];
        $item->save();
        return redirect()->back()->with('success_message', 'Product has been added successfully. <a href="' . url('shoping-cart') . '">View Cart</a>');


    }

    public function cart(){
        $getCartItems = Cart::getCartItems();
        
        //dd($getCartItems);
        return view('shoping-cart')->with(compact('getCartItems'));
    }
    
    
     public function cartDelete(Request $request){
        if($request->ajax()){
            $data = $request->all();
            /*echo "<pre>"; print_r($data); die;*/
            Cart::where('id',$data['cartid'])->delete();
            $getCartItems = Cart::getCartItems();
            return response()->json(['view'=>(String)View::make('Cart-items')->with(compact('getCartItems'))]);
        }
    }

    public function checkout(Request $request) {
        $deliveryAddresses = DeliveryAddress::deliveryAddresses();
        $getCartItems = Cart::getCartItems();
    
        if (count($getCartItems) == 0) {
            $message = "Shopping Cart Is empty! Please add products in the cart";
            return redirect('cart')->with('error_message', $message);
        }
        
        if ($request->isMethod('post')) {
            $data = $request->all();
            
            // Delivery validation
            if (empty($data['address_id'])) {
                $message = "Please select a Delivery Address!";
                return redirect()->back()->with('error_message', $message);
            }
    
            // Payment gateway validation
            if (empty($data['payment_gateway'])) {
                $message = "Please select a Payment Method!";
                return redirect()->back()->with('error_message', $message);
            }
    
            // Terms and conditions validation
            if (empty($data['termsandconditions'])) {
                $message = "Please Agree to T&C!";
                return redirect()->back()->with('error_message', $message);
            }
    
            $deliveryAddresses = DeliveryAddress::where('id', $data['address_id'])->first()->toArray();
            
            // Set payment method as COD if selected, otherwise prepaid
            if ($data['payment_gateway'] == "COD") {
                $payment_method = "COD";
                $order_status = "New";
            } else {
                $payment_method = "Prepaid";
                $order_status = "Pending";
            }
    
            DB::beginTransaction();
            $total_price = 0;
    
            foreach ($getCartItems as $item) {
                $getDiscountAttributePrice = Product::getDiscountAttributePrice($item['product_id'], $item['size']);
                $total_price += ($getDiscountAttributePrice['final_price'] * $item['quantity']);
            }
    
            // Calculate shipping charges
            $shipping_charges = 0;
    
            // Calculate Grand Total
            $grand_total = $total_price + $shipping_charges;
            Session::put('grand_total', $grand_total);
    
            // Insert order details
            $order = new Order;
            $order->user_id = Auth::user()->id;
            $order->name = $deliveryAddresses['name'];
            $order->address = $deliveryAddresses['address'];
            $order->city = $deliveryAddresses['city'];
            $order->state = $deliveryAddresses['state'];
            $order->country = $deliveryAddresses['country'];
            $order->pincode = $deliveryAddresses['pincode'];
            $order->mobile = $deliveryAddresses['mobile'];
            $order->email = Auth::user()->email;
            $order->shipping_charges = $shipping_charges;
            $order->order_status = $order_status;
            $order->payment_method = $payment_method;
            $order->payment_gateway	 = $data['payment_gateway'];
            $order->grand_total = $grand_total;
            $order->save();
            
            $order_id = DB::getPdo()->LastInsertId();
    
            foreach ($getCartItems as $item) {
                $cartItem = new OrdersProduct;
                $cartItem->order_id = $order_id;
                $cartItem->user_id = Auth::user()->id;
                $getProductDetails = Product::select('product_code','product_name','product_color','admin_id','vendor_id')->where('id',$item['product_id'])->first()->toArray();
    
                $cartItem->admin_id = $getProductDetails['admin_id'];
                $cartItem->vendor_id = $getProductDetails['vendor_id'];
                $cartItem->product_id = $item['product_id'];
                $cartItem->product_code = $getProductDetails['product_code'];
                $cartItem->product_name = $getProductDetails['product_name'];
                $cartItem->product_color = $getProductDetails['product_color'];
                $cartItem->product_size = $item['size'];
                $getDiscountAttributePrice = Product::getDiscountAttributePrice($item['product_id'], $item['size']);
                $cartItem->product_price = $getDiscountAttributePrice['final_price'];
                $cartItem->product_qty = $item['quantity'];
                $cartItem->save();
            }
    
            Session::put('order_id', $order_id);
            DB::commit();
    
            // Redirect based on payment method
            if ($data['payment_gateway'] == "COD") {
                return redirect('Thanks');
            } elseif ($data['payment_gateway'] == "Stripe") {
                return redirect('stripe');
            } elseif ($data['payment_gateway'] == "PhonePe") {  
                $mobileNumber = $deliveryAddresses['mobile']; // Retrieve mobile number from delivery addresses
                return (new PhonePeController())->phonepe($grand_total, $mobileNumber);
            }
            
            else {
                return "Other prepaid payment methods coming soon";
            }
        }
        
        return view('checkout')->with(compact('deliveryAddresses', 'getCartItems'));
    }
    
    
    public function addProductWishlist(Request $request) {
        if ($request->ajax()) {
            $data = $request->all();
            //echo"<pre>"; print_r($data); die;
          $countWishlist = Wishlist::countWishlist($data['product_id']);
            if ($countWishlist==0) {
                /// add product in user wishlist
                $wishlist = new Wishlist;
                $wishlist->user_id = Auth::user()->id;
                $wishlist->product_id = $data['product_id'];
                $wishlist->save();
                return response()->json(['status'=>true,'action'=>'add']);
                

            }else{
                /// remove product from wishlist
                Wishlist::where(['user_id'=>Auth::user()->id,'product_id'=>$data['product_id']])->delete();
                return response()->json(['status'=>true,'action'=>'remove']);


            }

        }
        
    }

    public function viewwishlist(){
        $userWishlistItems = Wishlist::userWishlistItems();
        $meta_title = "Wish List - Odd";
        $meta_description = "View Shopping Cart of Odd ";
        $meta_keywords = "Wish list,  Odd ";
        return view('Wishlist')->with(compact('userWishlistItems','meta_title','meta_description','meta_keywords'));

    }
    public function Thanks(){
        if (Session::has('order_id')) {
            Cart::where('user_id',Auth::user()->id)->delete();
            return view('orderthanks');
        }
        else {
             return redirect('shoping-cart');
        }
         
        
    }


    
}
 