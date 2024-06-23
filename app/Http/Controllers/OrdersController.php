<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\OrderStatus;
use Session;
use Auth;

class OrdersController extends Controller
{
    //
    public function orders() {
        
        Session::put('page','orders');
        
        $adminType = Auth::guard('admin')->user()->type;
        $vendor_id = Auth::guard('admin')->user()->vendor_id;

        if ($adminType == "vendor") {
            $vendorStatus = Auth::guard('admin')->user()->admin_status;
            if ($vendorStatus == 0) {
                return redirect('update-vendor-details.personal')->with('error_message', 'Your Vendor Account is not approved yet.');
            }
        }    
        if ($adminType == "vendor"){
            $orders = Order::with(['order_products'=>function($query)use($vendor_id){
                $query->where('vendor_id',$vendor_id);
            }])->orderBy('id','Desc')->get()->toArray();

        } else {
            $orders = Order::with('order_products')->orderBy('id','Desc')->get()->toArray();
            
        }
            
        //dd($orders);
        return view('Admin.admin.orders')->with(compact('orders'));
        
    }

    public function ordersdetails($id){
        $ordersDetails = Order::with('order_products')->where('id',$id)->first()->toArray();
        $userDetails = User::where('id', $ordersDetails['user_id'])->first()->toArray();
        $orderStatuses = OrderStatus::where('Orderstatus',1)->get()->toArray();
        return view('Admin.admin.vieworderdetails')->with(compact('ordersDetails','userDetails','orderStatuses'));
    }
 

    public function orderstatus(Request $request){
        if ($request->isMethod('post')) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            if (empty($data['courier_name']) && empty($data['tracking_number']) && $data['order_status'] == "Shipped") {
                $getResults = Order::pushOrder($data['order_id']);
                # code...
                if (!isset($getResults['status']) || (isset($getResults['status']) && $getResults['status'] == "false")) {
                    Session::put('error_message', $getResults['message']);
                    return redirect()->back();
                }
            }
            
            Order::where('id',$data['order_id'])->update(['order_status'=>$data['order_status']]);
            
            return redirect()->back()->with('success_message','Order Status has been updated successfully');
        }
        
    }

}
