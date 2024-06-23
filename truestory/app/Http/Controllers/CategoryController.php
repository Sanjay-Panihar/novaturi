<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Section;
use Session;
use Image;


class CategoryController extends Controller
{
    public function Categories(){
        $categories = Category::get()->toArray();
       // dd('categories');
        return view('Admin.category.categories')->with(compact('categories'));
    }

    
    public function deletecategory($id){
        Category::where('id',$id)->delete();
        return redirect()->back()->with('Success_message',
                'Your Current password is Updated');
    }

    public function AddEditcategory(Request $request,$id=null){
        Session::put('page','categories');
        if ($id=="") {
            $title = "Add Category";   
            $category = new Category;
            $message = "category added successfully!";
        }
        else {
            $title = "Edit Category";
            $category = find($id);
            $message = "category updated successfully!";
        }
        if ($request->isMethod('post')) {
         $data = $request->all();
        ///echo"<pre>"; print_r($data); die;

        //upload category image
        
        if ($request->hasFile('category_image')) {
            $image_tmp = $request->file('category_image');
            if ($image_tmp->isValid()) {
                $extension = $image_tmp->getClientOriginalExtension();
                $imageName = rand(111, 99999) . '.' . $extension;
                $mediumimagepath = 'admin/category_image/' . $imageName;
                
                // Upload and resize the image
                
                Image::make($image_tmp)->resize(500,500)->save($mediumimagepath);
             
          
                // Insert the image name in the product table
                $category->category_image = $imageName;
        
                // Save the product data in the database
                //$product->save();
            }
        }
     
        $category->section_id = $data['section_id'];
        $category->parent_id = $data['parent_id'];
        $category->category_name = $data['category_name'];
        $category->category_discount = $data['category_discount'];
        $category->description = $data['description'];
        $category->featured_category = $data['featured_category'];
        $category->url = $data['url'];
        $category->meta_title = $data['meta_title'];
        $category->meta_description = $data['meta_description'];
        $category->meta_keywords = $data['meta_Keywords'];
        $category->category_status = 1;
        $category->save();

        return redirect('Categories')->with('sucess_message',$message);
     }
        $getSections = Section::get()->toArray(); 
       
        
        return view('Admin.category.Add-Edit-category')->with(compact('title', 'category', 'getSections'));
          
    }
   
 }
