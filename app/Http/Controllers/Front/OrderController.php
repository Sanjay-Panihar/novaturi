<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrdersProduct;

use Auth;

class OrderController extends Controller
{
    public function userorder($id=null) {
        if(empty($id)){
            $orders = Order::with('order_products')->where('user_id',Auth::user()->id)->orderBy('id','Desc')->get()->toArray();
           //dd($orders);
           return view('Orders.order')->with(compact('orders'));

        }
        else {
            //echo "order details"; die;
            $orderDetails = Order::with('order_products')->where('id',$id)->first()->toArray();
            return view('Orders.ordersDetails')->with(compact('orderDetails'));
        }
        
        
    }

}
