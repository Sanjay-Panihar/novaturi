<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Section;
use App\Models\Category;
use App\Models\Admin;
use App\Models\ProductsImage;
use App\Models\ProductsAttribute;
use Session;
use Auth;
use Image;


class ProductController extends Controller 
{
    
    public function products()
    {
        Session::put('page', 'products');

        $adminType = Auth::guard('admin')->user()->type;
        $vendor_id = Auth::guard('admin')->user()->vendor_id;

        if ($adminType == "vendor") {
            $vendorStatus = Auth::guard('admin')->user()->admin_status;
            if ($vendorStatus == 0) {
                return redirect('update-vendor-details.personal')->with('error_message', 'Your Vendor Account is not approved yet.');
            }

            // Fetch products for the vendor
            $products = Product::where('vendor_id', $vendor_id)
                ->with(['section' => function ($query) {
                    $query->select('id', 'name');
                }, 'category' => function ($query) {
                    $query->select('id', 'category_name');
                }])
                ->get()
                ->toArray();
        } else {
            // Fetch all products for admins
            $products = Product::with(['section' => function ($query) {
                $query->select('id', 'name');
            }, 'category' => function ($query) {
                $query->select('id', 'category_name');
            }])
                ->get()
                ->toArray();
        }

        return view('Admin.product.products')->with(compact('products'));
    }

    
    
    
    public function updateproductstatus(Request $request){
        if ($request->ajax()) {
            $data = $request->all();
            if ($data['status']=="Active") {
                $status = 0;
            }
            else {
                $status = 1;
            }
            Product::where('id',$data['product_id'])->update(['section_status'=>$status]);
            return response()->json(['product_status'=>$status,'product_id'=>$data['product_id']]);
        }
    }

    public function deleteproduct($id){
        Product::where('id',$id)->delete();
        return redirect()->back()->with('Success_message',
                'Your product is deleted');
    }
    public function AddEditproduct(Request $request, $id=null){
        if($id==""){
            $title = "Add Product"; 
            $product = new Product;
            $message = "product Added Successfully!";
        }
        else{
            $title = "Edit Product";
        }  
        if($request->isMethod('post')){
            $data = $request->all();
            $rules = [
                "product_name" => "required|regex:/^[\pL\s\-]*$/u|max:250",
                "category_id" => "required|regex:/^[\pL\s\-]*$/u",
                "product_code" => "required",
                "product_price" => "required|regex:/^[\pL\s\-]*$/u",
                "product_weight" => "required|regex:/^[\pL\s\-]*$/u",
                "product_color" => "required|regex:/^[\pL\s\-]*$/u", 
                "description" => "max:2000",
                "shortdescription" => "max:250"
            ];
            $customMessages = [
                "product_name.required" => "Product Name is required",
                "category_id.required" => "Category is required",
                "product_code" => "Please Enter product code",
                "product_price" => "Please enter Gst number",
                "product_price.regex" => "Valid Product Price is required", 
                "product_weight.required" => "Product weight is required",
                "product_weight.regex" => "Valid Product weight is required",
                "product_color.required" => "Product color is required",
                "product_color.regex" => "Valid Product color is required",
                "description.max" => "Maximum word limit is 2000",
                "shortdescription.max" => "Maximum word limit is 250"
            ];
            $this->validate($request,$rules,$customMessages);

            ////////////////////upload product adfter resize ////////////////////

            if ($request->hasFile('product_image')) {
                $image_tmp = $request->file('product_image');
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $imageName = rand(111, 99999) . '.' . $extension;
                    $largeimagepath = 'admin/product_image/largeimage/' . $imageName;
                    $mediumimagepath = 'admin/product_image/mediumimage/' . $imageName;
                    $smallimagepath = 'admin/product_image/smallimage/' . $imageName;
            
                    // Upload and resize the image
                    Image::make($image_tmp)->resize(1000,1000)->save($largeimagepath);
                    Image::make($image_tmp)->resize(500,500)->save($mediumimagepath);
                    Image::make($image_tmp)->resize(250,250)->save($smallimagepath);
              
                    // Insert the image name in the product table
                    $product->product_image = $imageName;
            
                    // Save the product data in the database
                    //$product->save();
                }
            }
            


            /////////////-----------------///////////////////

            $categoryDetails = category::find($data['category_id']);
            $product->section_id = $categoryDetails['section_id'];
            $product->category_id = $data['category_id'];
            $product->group_code = $data['group_code'];
    
            $adminType = Auth::guard('admin')->user()->type;
            $vendor_id = Auth::guard('admin')->user()->vendor_id;
            $admin_id = Auth::guard('admin')->user()->id;

            $product->admin_type = $adminType; 
            $product->admin_id = $admin_id;
            if($adminType=="vendor"){
                $product->vendor_id = $vendor_id;                
            }else {
                 $product->vendor_id = 0;
            }
            $product->product_name = $data['product_name']; 
            $product->product_code = $data['product_code']; 
            $product->product_color = $data['product_color']; 
            $product->product_price = $data['product_price']; 
            $product->product_discount = $data['product_discount']; 
            $product->product_weight = $data['product_weight']; 
            $product->description = $data['description'];
            $product->shortdescription = $data['shortdescription'];
            
            $product->meta_title = $data['meta_title']; 
            $product->meta_description = $data['meta_description'];
            $product->refund_return = $data['refund_return'];
            
            $product->meta_keywords = $data['meta_keywords']; 
            $product->is_featured = $data['is_featured']; 
            
            $product->product_status = 1; 
            $product->save();
            return redirect('products')->with('Success_message',$message);


             
        }
      
        /// get section with categories and sub categories
        $categories = Section::with('categories')->get()->toArray();
        //dd($categories);
        return view('Admin.product.Add-Edit-Product')->with(compact('title','categories'));
    }
    

    public function Addattributes( Request $request ,$id){
        $product = Product::find($id);
        if($request->isMethod('post')){
            $data = $request->all();
           //echo "<pre>"; print_r($data); die;
           foreach ($data['SKU'] as $key => $value) {
                if (!empty($value)) {
                    $attribute = new ProductsAttribute;
                    $attribute->product_id = $id;
                    $attribute->sku = $value;
                    $attribute->size = $data['size'][$key];
                    $attribute->Price = $data['Price'][$key];
                    $attribute->Stocks = $data['Stocks'][$key];
                    $attribute->status = 1;
                    $attribute->save();
                
                }
                
           }
           return redirect()->back()->with('success_message','Product Attribute added successfully');
        }
       // 
            
 
        return view('Admin.Attributes.Add_edit_attribute')->with(compact('product')); 
    }
    public function Addimage($id, Request $request){
        Session::put('page','products');
        $product = Product::select('id','product_name','product_code','product_color'
        ,'product_price','product_image')->with('images')->find($id);
        if ($request->isMethod('post')) {
            $data = $request->all();
            //echo "<pre>"; Print_r($data); die;
            if ($request->hasFile('images')) {
                $images = $request->file('images');
                //echo "<pre>"; Print_r($images); die;
                foreach ($images as $key => $image) {
                            $image_tmp = Image::make($image);
                            $image_name = $image->getClientOriginalExtension();
                        
                            $extension = $image->getClientOriginalExtension();
                            $imageName = $image_tmp.rand(111, 99999) . '.' . $extension;
                            $largeimagepath = 'admin/product_image/largeimage/' . $imageName;
                            $mediumimagepath = 'admin/product_image/mediumimage/' . $imageName;
                            $smallimagepath = 'admin/product_image/smallimage/' . $imageName;
                    
                            // Upload and resize the image
                            Image::make($image_tmp)->resize(1000,1000)->save($largeimagepath);
                            Image::make($image_tmp)->resize(500,500)->save($mediumimagepath);
                            Image::make($image_tmp)->resize(250,250)->save($smallimagepath);
                      
                            // Insert the image name in the product table
                            $image = new ProductsImage;
                            $image->image = $imageName;
                            $image->product_id = $id;
                            $image->status = 1;
                            $image->save();

                    
                            // Save the product data in the database
                
                }
            }
            return redirect()->back()->with('success_message','Product Image has been added ');
        }
        return view('Admin.product.productImage')->with(compact('product')); 
    }
    
    public static function cartCount() {
        if (Auth::check()) {
            //user is looged in we will use auth
            $user_id = Auth::user()->id;
            $cartCount = DB::table('carts')->where('user_id',$user_id)->sum('quantity');
        }
        else {
            //user is not logged in we will use session
            $session_id = Session::get('session_id');
            $cartCount = DB::table('carts')->where('session_id',$session_id)->sum('quantity');
        }
       // dd($cartCount); 
        return $cartCount;
    }

}