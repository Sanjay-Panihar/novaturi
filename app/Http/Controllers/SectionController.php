<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;
use Session;

class SectionController extends Controller
{   
    public function sections(){
        Session::put('page','sections');
        $sections = Section::get()->toArray();
        return view('Admin.Sections.sections')->with(compact('sections'));

    }
    public function deletesection($id){
        Section::where('id',$id)->delete();
        return redirect()->back()->with('Success_message',
                'Your Current password is Updated');
    }
    public function AddEditSection(Request $request,$id=null){
        Session::put('page','sections');
        if ($id=="") {
            $title = "Add Section";
            $section = new Section;
            $message = "section added successfully!";
        }
        else {
            $title = "Edit Section";
            $section = Section::find($id);
            $message = "section updated successfully!";
        }
        if ($request->isMethod('post')) {
            $data = $request->all();
            //echo"<pre>"; print_r($data); die;
        

        $rules = [
             'section_name' => 'required|regex:/^[\pL\s\-]+$/u',
        ];
        $customMessages = [
            'section_name.required' => 'Name is required',
            'section_name.regex' => 'Valid Name is required',
       ];
       $this->validate($request,$rules,$customMessages);
       $section->name = $data['section_name'];
       $section->section_status = 1;
       $section->save();
       return redirect('Sections')->with('success_message','section is added');
    }
        

    
        return view('Admin.Sections.AddEditSection')->with(compact('title','section'));
          
    }


     public function updatesectionstatus(Request $request){
        if ($request->ajax()) {
            $data = $request->all();
            if ($data['status']=="Active") {
                $status = 0;
            }
            else {
                $status = 1;
            }
            Section::where('id',$data['section_id'])->update(['section_status'=>$status]);
            return response()->json(['section_status'=>$status,'section_id'=>$data['section_id']]);
        }
    }
    

}
