<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cart;
use Auth;
use Session;
use Validator;



class UserController extends Controller
{

    public function userloginfunction(){
        return view('userLogin');
        
    }
    
    public function userforgotpassword(Request $request){
        if($request->ajax()){
            $data = $request->all();
            echo "<pre>"; print_r($data); die;
        }
        return view('userforgetpassword');
        
    }
   
    
    public function user_registration(Request $request){
        if ($request->ajax()) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;////////////////////////
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:100',
                'mobile' => 'required|numeric|digits:10',
                'email' => 'required|email|unique:users|max:100',
                'password' => 'required|max:15|min:7',
                'accept' => 'required',

                ],
                [
                    'accept.required' => 'Please accept our Terms & Conditions',  
                ]
            );

            if($validator->passes()){
                 // Registar the user///////////////////
                $user = new User;
                $user->name = $data['name'];
                $user->mobile = $data['mobile'];
                $user->email = $data['email'];
                $user->password = bcrypt($data['password']);
                $user->status = 1;
                $user->save();

                /// send register mail ////

                $email = $data['email'];
                $messageData = [
                    'email' => $data['email'],
                    'name' => $data['name'],
                    'mobile' => $data['mobile'],
                    'code' => base64_encode($data['email'])
                ];
                Mail::send('emails.user_confirmation', $messageData, 
                function ($message) use ($email) {
                $message->to($email)->subject('Confirm Your User Account');
               });

    
              //DB::commit();

                
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////
                if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']]))
                {
                    $redirectTO = url('Customer/login/registration');
                   return response()->json(['type'=>'success','url'=>$redirectTO]);
                }

            }else{
                return response()->json(['type'=>'error','errors'=>$validator->messages()]);
            }
           
        }
        //return view('userlogin');
        
    }
////////////////////////////////////////////////////////////////////////////////////////////////////
    public function useraccount(Request $request){
        if($request->ajax()) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:100',
                'mobile' => 'required|numeric|digits:10',
                'city' => 'required|string|max:100',
                'address' => 'required|string|max:100',
                'country' => 'required|string|max:100',
                'pincode' => 'required|numeric|digits:6',
                
     
                ]
            );
            if ($validator->passes()) {
                ///update user account details ///////////
                user::where('id',Auth::user()->id)->update(['name'=>$data['name'],'mobile'=>$data['mobile'],'city'=>$data['city'],'state'=>$data['state'],
                'address'=>$data['address'],'country'=>$data['country'],'pincode'=>$data['pincode']]);
                ////redirect back /////////////// 
                return response()->json(['type'=>'success','message'=>'your contact/billing details successfully updated!']);
            }else {
                return response()->json(['type'=>'error','errors'=>$validator->messages()]);
            }
             
        }else {       
            return view('user.UserAccount');
        }
        
             
    }
/////////////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////user login/////////////////////////////////////////////////////////////////

    public function user_login(Request $request){

        if($request->Ajax()){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die; 
            $validator = Validator::make($request->all(), [
                
                'email' => 'required|email|max:150|exists:users',
                'password' => 'required|max:15|min:7',

            ]);
                if($validator->passes()){
                    if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']]))
                    {
                        if (Auth::user()->status==0) {
                            Auth::logout();
                            return response()->json(['type'=>'inactive','message'=>'Your account is Inactive please contact Admin']);
                        }
                        if (!empty(Session::get('session_id'))) {
                            $user_id = Auth::user()->id;
                            $session_id = Session::get('session_id');
                            Cart::where('session_id',$session_id)->update(['user_id'=>$user_id]);
                        }


                        $redirectTO = url('shoping-cart');
                        return response()->json(['type'=>'success','url'=>$redirectTO]);
                    }else {
                        
                        return response()->json(['type'=>'incorrect','message'=>'Incorrect Email or Password!']);
                    }

                }else {
                    return response()->json(['type'=>'error','errors'=>$validator->messages()]);
                    
                }
        }
        
    }
    /////////////////////////////user account confirm/////////

        
    ////////////////////////////////////////////////////////////////////////////////////////
    public function userlogout(){
        Auth::logout();
        return redirect('/');
    }

    public function Confirm_user($code) {
        $email = base64_decode($code);
        $userCount = User::where('email',$email)->count();
        if ($userCount>0) {
          //Vendor email is already activated or not
          $userDetails = User::where('email',$email)->first();
          if($userDetails->status=="1"){
              $message = "Your User Account is already confirmed. You can login";  
              return redirect('Customer/login/registration')->with('error_message','Your account is already activated you can login now.');
          }
          else {
            User::where('email',$email)->update(['status'=>1]);
            $messageData = ['name' => $userDetails->name, 'mobile' => $userDetails->mobile,'email' => $userDetails->email ];
            Mail::send('emails.user_confirmed', $messageData, function ($message) use ($email) {
                $message->to($email)->subject('Your User Account Confirmed');
                               });

            return redirect('Customer/login/registration')->with('error_message','Your account is already activated you can login now.');

              
  

          }
        }
        else {
          abort(404);
        }
          
      }


}


