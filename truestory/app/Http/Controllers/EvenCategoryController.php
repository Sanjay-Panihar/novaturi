<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EvenCategory;

class EvenCategoryController extends Controller
{
    public function Eventcategory()
    {   $alleventcategory = EvenCategory::all()->toArray();
        return view('Admin.event.view-category')->with(compact('alleventcategory'));
    }

    

    public function AddEventcategory(Request $request)
{
    $category = new EvenCategory; // Define $category variable

    if ($request->isMethod('post')) {
        $data = $request->all();

        $category->name = $data['name'];
        $category->url = $data['url'];
        $category->status = 1;
        $category->save();

        return redirect('EventCategory');
    }

    return view('Admin.event.Add-category')->with(compact('category'));
}


public function deleteventcategory($id){
    EvenCategory::where('id',$id)->delete();
    return redirect()->back()->with('Success_message',
            'Event Category is deleted');
}
   
          
}
