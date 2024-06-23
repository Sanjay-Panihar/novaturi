<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Models\DeliveryAddress;
use Auth;
use Validator;

class AddressController extends Controller
{
    //
    public function getdeliveryaddress(Request $request)  {
        if($request->ajax()){
            $data = $request->all();
            $deliveryAddress = DeliveryAddress::where('id',$data['addressid'])->first()->toArray();
            return response()->json(['address'=>$deliveryAddress]);
            
        }
        
    }


    public function savedeliveryaddress(Request $request)  {
        if($request->ajax()){
            $validator = Validator::make($request->all(),[
                'delivery_name'=>'required|string|max:100',
                'delivery_address'=>'required|string|max:100',
                'delivery_State'=>'required|string|max:100',
                'delivery_City'=>'required|string|max:100',
                'delivery_Country'=>'required|string|max:100',
                'delivery_Pincode'=>'required|digits:6',
                'delivery_Mobile'=>'required|numeric|digits:10',

            ]); 
            if ($validator->passes()) {
                $data = $request->all();
                $address = array();
                $address['user_id']=Auth::user()->id;
                $address['name']=$data['delivery_name'];
                $address['address']=$data['delivery_address'];
                $address['state']=$data['delivery_State'];
                $address['city']=$data['delivery_City'];
                $address['country']=$data['delivery_Country'];
                $address['pincode']=$data['delivery_Pincode'];
                $address['mobile']=$data['delivery_Mobile'];
                if (!empty($data['delivery_id'])) {
                
                    DeliveryAddress::where('id',$data['delivery_id'])->update($address);
                }else {
                //$address['status']=1;
                    DeliveryAddress::create($address);
                }
                $deliveryAddresses = DeliveryAddress::deliveryAddresses();
                // echo"<pre>"; print_r($data); die;
                return response()->json([
                    'view'=>(string)View::make('delivery_addresses')->with(compact('deliveryAddresses'))
                ]);
            
            }else{

                return response()->json(['type'=>'error','errors'=>$validator->messages()]);
            }
            
        }
        
    }

    public function removedeliveryaddress(Request $request){
        if ($request->ajax()) {
            $data = $request->all();
            //echo"<pre>"; print_r($data); die;
            DeliveryAddress::where('id',$data['addressid'])->delete();
            $deliveryAddresses = DeliveryAddress::deliveryAddresses();
            return response()->json([
                'view'=>(string)View::make('delivery_addresses')->with(compact('deliveryAddresses'))
            ]);
            
        }
        
    }
}
