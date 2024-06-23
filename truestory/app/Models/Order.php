<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;



class Order extends Model
{
    use HasFactory;
    public function order_products(){
        return $this->hasMany('App\Models\OrdersProduct','order_id');

    }
 
    public function order_items(){
        return $this->hasmany('App\Models\OrdersProduct','order_id');
    }

    public static function pushOrder($order_id) {
        $orderDetails = Order::with('order_items')->where('id',$order_id)->first()->toArray();
        //dd($orderDetails); die;
        $orderDetails['order_id'] = $orderDetails['id'];
        $orderDetails['order_date'] = $orderDetails['created_at'];
        $orderDetails['pickup_location'] = "Primary";
        $orderDetails['channel_id'] = "4550956";
        $orderDetails['comment'] = " ";
        $orderDetails['billing_customer_name'] = $orderDetails['name'];
        $orderDetails['billing_last_name'] = "";
        $orderDetails['billing_address'] = $orderDetails['address'];
        $orderDetails['billing_address_2'] = "";
        $orderDetails['billing_city'] = $orderDetails['city'];
        $orderDetails['billing_pincode'] = $orderDetails['pincode'];
        $orderDetails['billing_state'] = $orderDetails['state'];
        $orderDetails['billing_country'] = $orderDetails['country'];
        $orderDetails['billing_email'] = $orderDetails['email'];
        $orderDetails['billing_phone'] = $orderDetails['mobile'];
        $orderDetails['shipping_is_billing'] = true;
        $orderDetails['shipping_customer_name'] = $orderDetails['name'];
        $orderDetails['shipping_last_name'] = "";
        $orderDetails['shipping_address'] = $orderDetails['address'];
        $orderDetails['shipping_address_2'] = "";
        $orderDetails['shipping_city'] = $orderDetails['city'];
        $orderDetails['shipping_pincode'] = $orderDetails['pincode'];
        $orderDetails['shipping_state'] = $orderDetails['state'];
        $orderDetails['shipping_country'] = $orderDetails['country'];
        $orderDetails['shipping_email'] = $orderDetails['email'];
        $orderDetails['shipping_phone'] = $orderDetails['mobile'];
        foreach ($orderDetails['order_items'] as $key =>$item){
            $orderDetails['order_items'][$key]['name'] = $item['product_name'];
            $orderDetails['order_items'][$key]['sku'] = $item['product_code'];
            $orderDetails['order_items'][$key]['units'] = $item['product_qty'];
            $orderDetails['order_items'][$key]['selling_price'] = $item['product_price'];
            $orderDetails['order_items'][$key]['discount'] = "";
            $orderDetails['order_items'][$key]['tax'] = "";
            $orderDetails['order_items'][$key]['hsn'] = "";
        }
        $orderDetails['shipping_charges'] = 0;
        $orderDetails['giftwrap_charges'] = 0;
        $orderDetails['transaction_charges'] = 0;
        $orderDetails['total_discount'] = 0;
        $orderDetails['sub_total'] = $orderDetails['grand_total'];
        $orderDetails['length'] = 1;
        $orderDetails['breadth'] = 1;
        $orderDetails['height'] = 1;
        $orderDetails['weight'] = 1;

        //echo"<pre>"; print_r(json_encode($orderDetails)); die;
        $orderDetails = json_encode($orderDetails);

        ////////////////generate access token///////////////////

         // Make a POST request to the Shiprocket API for authentication
         $response = Http::post('https://apiv2.shiprocket.in/v1/external/auth/login', [
            'email' => 'hello@theoddfactory.com',
            'password' => 'Rahul@321',
        ]);
        
        // Check if the request was successful
        if ($response->successful()) {
            // Parse the JSON response
            $server_output = $response->json();
            // Handle the response data as needed
           // echo "<pre>"; print_r($server_output); die;
        } else {
            // Handle the case where the request failed
            echo "HTTP Error: " . $response->status();
        }

        ////////////////////////create order////////////////////////////////////

        $url = "https://apiv2.shiprocket.in/v1/external/orders/create/adhoc";
        $c = curl_init($url);
        curl_setopt($c, CURLOPT_POST, 1);
        curl_setopt($c, CURLOPT_POSTFIELDS, $orderDetails);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($c, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($c, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($c, CURLOPT_HTTPHEADER,array('Content-Type:application/json','Authorization:Bearer '
          .$server_output['token'].''));
        $result = curl_exec($c);
        curl_close($c);

        $result = json_decode($result,true);
        //print_r($result); die;

        if(isset($result['status_code'])&&$result['status_code']==1){
            Order::where('id',$order_id)->update(['is_pushed'=>1]);
            $status = "true";
            $message = "Order successfully send to shiprocket";
        }
        else{
            $status = "false";
            $message = "order not send to shipRocket. Please contact Admin";
        }
        return array(['status'=>$status]);

    }
    
    
    
}
  