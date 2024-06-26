<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Vendor;
use App\Models\VendorsBusinessDetails;
use App\Models\VendorsBankDetails;
use Validator;
use hash;
use DB;
use Illuminate\Support\Facades\Password;

class VendorController extends Controller
{
    public function Vendorloginfun(){
        return view('vendor.login_registar');  
    } 
    
    public function Vendor_registration(Request $request){
       if ($request->isMethod('POST')) {
        $data = $request->all();
        

        // validate Vendor

        $rules= [
            "name"=> "required",
            "email" =>"required|email|unique:admins|unique:vendors",
            "mobile" =>"required|min:10|numeric|unique:admins|unique:vendors",

        ];
        $customMessages= [
            "name.required"=> "Name is required",
            "email.required" =>"Email is required",
            "email.unique" =>"Email is already exists",
            "mobile.required" =>"Mobile Number is required",
            "mobile.unique" =>"Mobile Number is already exists",
        ];
        $validator = Validator::make($data,$rules,$customMessages);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        DB::beginTransaction();
        ///create vendor account ////

        //insert the data in vendor table in vendor table 
        $vendor = new Vendor;
        $vendor->name = $data['name'];
        $vendor->mobile = $data['mobile']; 
        $vendor->email = $data['email']; 
        $vendor->vendor_status = 0; 
        //set default time in india 
        //date_default_timezone_get("Asia/Kolkata");
        //$vendor->created_at = date("Y-m-d H:i:s");
        //$vendor->updated_at = date("Y-m-d H:i:s");
        $vendor->save(); 

        $vendor_id = DB::getpdo()->lastInsertId();

        //insert the data in admin table in vendor table 
        $admin = new Admin;
        $admin->type = 'vendor';
        $admin->vendor_id = $vendor_id;
        $admin->name = $data['name'];
        $admin->mobile = $data['mobile']; 
        $admin->email = $data['email']; 
        $admin->password = bcrypt($data['password']);
        //date_default_timezone_get("Asia/Kolkata");
        //$admin->created_at = date("Y-m-d H:i:s");
        //$admin->updated_at = date("Y-m-d H:i:s");

        
        $admin->admin_status = 0; 
        $admin->save(); 
        
        $admin = new VendorsBusinessDetails;
        $admin->vendor_id = $vendor_id;
        $admin->save();

        $admin = new VendorsBankDetails;
        $admin->vendor_id = $vendor_id;
        $admin->save();

         // send confirmation Email
         $email = $data['email'];
         $messageData = [
             'email' => $data['email'],
             'name' => $data['name'],
             'code' => base64_encode($data['email'])
         ];
         Mail::send('emails.vendor_confirmation', $messageData, 
         function ($message) use ($email) {
             $message->to($email)->subject('Confirm Your Vendor Account');
         });

    
        DB::commit();


       

        // Redirect back to vendor with success message 

        $message= "Thanks for Registering as a vendor. Please check your inbox for our verification mail. 

                    Ps - Don’t forget to check your spam if not received in primary";
        return redirect()->back()->with('success_message',$message);
       } 
    } 
    public function Confirm_vendor($email) {
      $email = base64_decode($email);
      $vendorCount = Vendor::where('email',$email)->count();
      if ($vendorCount>0) {
        //Vendor email is already activated or not
        $vendorDetails = Vendor::where('email',$email)->first();
        if($vendorDetails->confirm=="yes"){
            $message = "Your Vendor Account is already confirmed. You can login";  
            return redirect('vendor/login-register')->with('error_message',$message);
        }
        else {
            ////update confirm column to yes in both  admins/ vendors tables  to activate
           Admin::where('email',$email)->update(['confirm'=>'Yes']);
           Vendor::where('email',$email)->update(['confirm'=>'Yes']);

           //send Resgister Email
           $messageData = [
               'email' => $email,
               'name' => $vendorDetails->name,
               'mobile' => $vendorDetails->mobile
           ];
           Mail::send('emails.vendor_confirmed', $messageData, function ($message) use ($email) {
               $message->to($email)->subject('Your Vendor Account Confirmed');
           });


           // Redirect  to Vendor login page with success message

           $message = "Your Venodr Email account is confirmed. You can login and add your 
           personal business and bank details to activate your Vendor Account to
            add products";
            return redirect('AdminLogin')->with('success_message',$message);
        }
      }
      else {
        abort(404);
      }
        
    }

    public function Supliers(){
       
        $supliers = Vendor::get()->toArray();
        return view('vendordetails')->with(compact('supliers'));

    }
    public function showLinkRequestForm(Request $request){
        return view('admin.forgot_password');
    }
    public function sendResetLinkEmail(Request $request){
        $request->validate(['email' => 'required|email']);
        $response = Password::broker('vendors')->sendResetLink(
            $request->only('email')
        );
        return $response == Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($response)])
                    : back()->withErrors(['email' => __($response)]);
    }
    public function showResetForm(Request $request, $token = null) {
        return view('admin.password_reset')->with(['token' => $token, 'email' => $request->email]);

    }
    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $status = Password::broker('vendors')->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($vendor, $password) {
                // Find the admin record associated with this vendor
                $admin = Admin::where('email', $vendor->email)->first();
                if ($admin) {
                    $admin->password = bcrypt($password);
                    $admin->save();
                }
            }
        );

        return $status == Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }

}
