<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductsFilter;
use App\Models\ProductsFiltersValue;
use App\Models\Section;
use Session;
use DB;



class FilterController extends Controller
{
    public function filters(){
        Session::put('page','filter');
        $filters = ProductsFilter::get()->toArray();
        //dd($filters); 
        return view('Admin.filters.filters')->with(compact('filters'));
    }

    public function filtervalues(){
        Session::put('page','filters');
        $filter_values = ProductsFiltersValue::get()->toArray();
        return view('Admin.filters.filters_values')->with(compact('filter_values'));

    }

    public function addeditfilter(Request $request,$id=null){
        Session::put('page','filters');
        if ($id=="") {
            $title = "Add Filter";
            $filter = new ProductsFilter;
            $message = "Filter added successfully";
        }
        else{
            $title = "Edit Filter";
            $filter =  ProductsFilter::find($id);
            $message = "Filter added successfully";

        }

        if ($request->isMethod('post')) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;

            $cat_ids = implode(',',$data['cat_ids']);

            //// save filter column details in products_filters table
            $filter->cat_ids = $cat_ids;
            $filter->filter_name = $data['filter_name'];
            $filter->filter_column = $data['filter_column'];
            $filter->status = 1;
            $filter->save();

            //Add filter 

            DB::statement('ALTER TABLE products ADD `' . $data['filter_column'] . '` VARCHAR(255) AFTER description');

            return redirect()->back()->with('success_message',$message);
            
        }
        $categories = Section::with('categories')->get()->toArray();
        return view('Admin.filters.add_edit_filter')->with(compact('title','categories','filter'));
        
    }



    ////////////////////////////////////////////////////////////////////////////////////////


    public function addeditfiltervalue(Request $request,$id=null){
        Session::put('page','filters');
        if ($id=="") {
            $title = "Add Filter Values";
            $filter = new ProductsFiltersValue;
            $message = "Filter added successfully";
        }
        else{
            $title = "Edit Filter Values";
            $filter =  ProductsFiltersValue::find($id);
            $message = "Filter added successfully";

        }

        if ($request->isMethod('post')) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;


            //// save filter value details in products_filters table
        
            $filter->filter_id = $data['filter_id'];
            $filter->filter_value = $data['filter_value'];
            $filter->status = 1;
            $filter->save();

            //Add filter 
            return redirect()->back()->with('success_message',$message);
            
        }
        $filters = ProductsFilter::where('status',1)->get()->toArray();
       
        return view('Admin.filters.add_edit_filter_value')->with(compact('title','filter','filters'));
        
    }
    //////////////////////////////////////////////////////////////////////////////////////////

    public function deleteproduct($id){
        Product::where('id',$id)->delete();
        return redirect()->back()->with('Success_message',
            'Your product is deleted');
    }
}
