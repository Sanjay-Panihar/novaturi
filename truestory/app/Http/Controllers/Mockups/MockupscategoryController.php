<?php

namespace App\Http\Controllers\Mockups;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mockupcategory;
use App\Models\Mockupsection;
use Session;

class MockupscategoryController extends Controller
{
    public function mockupcategories(){
        $categories = Mockupcategory::get()->toArray();
        //dd('categories');
        return view('Admin.mockup.category.mockupscategories')->with(compact('categories'));
    }

    
    public function mockupdeletecategory($id){
        Mockupcategory::where('id',$id)->delete();
        return redirect()->back()->with('Success_message',
                'Your Current password is Updated');
    }

    public function AddEditMockupcategory(Request $request,$id=null){
        Session::put('page','categories');
        if ($id=="") {
            $title = "Add Category";   
            $category = new Mockupcategory;
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
     
        $category->section_id = $data['section_id'];
        //$category->parent_id = $data['parent_id'];
        $category->category_name = $data['category_name'];
        $category->url = $data['url'];
        $category->category_status = 1;
        $category->save();

        return redirect('mockupscategories')->with('sucess_message',$message);
     }
        $getSections = Mockupsection::get()->toArray(); 
       
        
        return view('Admin.mockup.category.AddEditMockupscategory')->with(compact('title', 'category', 'getSections'));
          
    }
}
