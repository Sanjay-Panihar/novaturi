<?php

namespace App\Http\Controllers\Mockups;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mockupsection;
use Session;

class MockupssectionController extends Controller
{
    //
    public function Mockupsections(){
        Session::put('page','sections');
        $sections = Mockupsection::get()->toArray();
        return view('Admin.mockup.section.mockupsection')->with(compact('sections'));

    }

    public function deletemockupsection($id){
        Mockupsection::where('id',$id)->delete();
        return redirect()->back()->with('Success_message',
                'Your Current password is Updated');
    }
    
    public function AddEditMockupSection(Request $request,$id=null){
        Session::put('page','sections');
        if ($id=="") {
            $title = "Add Section";
            $section = new Mockupsection;
            $message = "section added successfully!";
        }
        else {
            $title = "Edit Section";
            $section = Mockupsection::find($id);
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
       return redirect('MockupSections')->with('success_message','section is added');
    }
        

    
        return view('Admin.mockup.section.add-edit-mockups')->with(compact('title','section'));
          
    }


     
}
