<?php

namespace App\Http\Controllers\Mockups;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Models\Mockup;
use App\Models\Mockupcategory;
use App\Models\Mockupsection;
use App\Models\Admin;
use Session;
use Auth;
use Image;
use Illuminate\Http\Request;

class MockupsController extends Controller
{
    //
    public function Mockuproducts()
    {
        Session::put('page', 'products');

        $adminType = Auth::guard('admin')->user()->type;
        
            // Fetch all products for admins
            $products = Mockup::with(['section' => function ($query) {$query->select('id', 'name');
            }, 'category' => function ($query) {$query->select('id','category_name');
            }])->get()->toArray();
 
        return view('Admin.mockup.products.mockupproducts')->with(compact('products'));
    }


    public function AddEditmockupsproduct(Request $request, $id=null){
        if($id==""){
            $title = "Add Product"; 
            $product = new Mockup;
            $message = "product Added Successfully!";
        }
        else{
            $title = "Edit Product";
        }  
        if($request->isMethod('post')){
            $data = $request->all();
            $rules= [
                "product_name"=> "required|regex:/[\pL\s\-]*$/u",
                "category_id"=> "required|regex:/[\pL\s\-]*$/u",
                "product_code" =>"required",
                "product_price" =>"required|regex:/[\pL\s\-]*$/u",
                "product_weight" =>"required|regex:/[\pL\s\-]*$/u",
                "product_color" =>"required|regex:/[\pL\s\-]*$/u",   
    
            ];
            $customMessages= [
                "product_name.required"=> "Product Name is required",
                "category_id.required"=> "Category is required",
                "product_code" =>"Please Enter product code",
                "product_price"=>"Please enter Gst number",
                "product_price.regex" =>"Valid Product Price is required", 
                "product_weight.required" =>" Product weight is required",
                "product_weight.regex" =>"Valid Product weight is required",
                "product_color.required" =>" Product color is required",
                "product_color.regex" =>"Valid Product color is required",
                
                
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

            $categoryDetails = Mockupcategory::find($data['category_id']);
            $product->section_id = $categoryDetails['section_id'];
            $product->category_id = $data['category_id'];
            $admin_id = Auth::guard('admin')->user()->id;
            $product->product_name = $data['product_name']; 
            $product->product_code = $data['product_code']; 
            $product->product_color = $data['product_color']; 
            $product->product_price = $data['product_price'];  
            $product->product_weight = $data['product_weight']; 
            $product->product_status = 1; 
            $product->save();
            return redirect('Mockuproducts')->with('Success_message',$message);
    
        }
      
        /// get section with categories and sub categories
        $categories = Mockupsection::with('categories')->get()->toArray();
        //dd($categories);
        return view('Admin.mockup.products.Add-edit-mockuproduct')->with(compact('title','categories'));
    }

    public function deletemockuproduct($id){
        Mockup::where('id',$id)->delete();
        return redirect()->back()->with('Success_message',
                'Your product is deleted');
    }

    public function mockuplisting(){
        $url = Route::getFacadeRoot()->current()->uri();
        $categoryCount = Mockupcategory::where(['url'=>$url,'category_status'=>1])->count();
        if ($categoryCount>0) {
            $categoryDetails = Mockupcategory::categoryDetails($url);
            $categoryProducts = Mockup::whereIn('category_id',$categoryDetails['catIds'])->
            where('product_status',1)->get()->toArray();

            if (isset($_GET['sort']) && !empty($_GET['sort'])) {
                if($_GET['sort']=="product_latest"){
                    $categoryProducts->orderby('products.id','Desc');    
                }
                
            }
            //dd($categoryProducts);
            //echo "Category exists "; die;
            return view('Admin.mockup.front.mockupgrid')->with(compact('categoryDetails','categoryProducts'));
        }else{
            abort(404);
        }
    }

    public function mockupsedit($id){
        $productDetails = Mockup::with('section','category')->find($id)->toArray();
        $categoryDetails = Mockupcategory::categoryDetails($productDetails['category']['url']);
        //dd($productDetails); die;
        return view('Generate-mockups')->with(compact('productDetails','categoryDetails'));
    }
    
}
