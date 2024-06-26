<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
Use DB;
Use Session;



class Product extends Model
{
    use HasFactory;
    public function section(){
        return $this->belongsTo(Section::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function attributes(){
        return $this->hasMany('App\Models\ProductsAttribute');
    }
    
    public function vendor(){
        return $this->belongsTo(Vendor::class);
    }

    public function images(){
        return $this->hasMany('App\Models\ProductsImage');
    }

    public static function getDiscountPrice($product_id){

        $proDetails = Product::select('product_price','product_discount','category_id')->where('id',$product_id)->first();
        $proDetails = json_decode(json_encode($proDetails),true);
        $catDetails = Category::select('category_discount')->where('id',$proDetails['category_id'])->first();
        $catDetails = json_decode(json_encode($catDetails),true);
        if ($proDetails['product_discount']>0) {
            $discounted_price = $proDetails['product_price'] - ($proDetails['product_price']*$proDetails['product_discount']/100);
            
        } else if($catDetails['category_discount']>0){
            $discounted_price = $proDetails['product_price'] - ($proDetails['product_price']*$catDetails['category_discount']/100);

        }
        else{
           
            $discounted_price = 0;
        }
        return $discounted_price ;

    }


    public static function getDiscountAttributePrice($product_id, $size)
    {
        $proAttr = ProductsAttribute::where(['product_id' => $product_id, 'size' => $size])->first();
    
        if ($proAttr) {
            $proAttrPrice = $proAttr->toArray();
            $proDetails = Product::select('product_discount', 'category_id')->where('id', $product_id)->first();
            $proDetails = json_decode(json_encode($proDetails), true);
            $catDetails = Category::select('category_discount')->where('id', $proDetails['category_id'])->first();
            $catDetails = json_decode(json_encode($catDetails), true);
    
            if ($proDetails['product_discount'] > 0) {
                $final_price = $proAttrPrice['price'] - ($proAttrPrice['price'] * $proDetails['product_discount'] / 100);
                $discount = $proAttrPrice['price'] - $final_price;
            } elseif ($catDetails['category_discount'] > 0) {
                $final_price = $proAttrPrice['price'] - ($proAttrPrice['price'] * $catDetails['category_discount'] / 100);
                $discount = $proAttrPrice['price'] - $final_price;
            } else {
                $final_price = $proAttrPrice['price'];
                $discount = 0;
            }
    
            return array('product_price' => $proAttrPrice['price'], 'final_price' => $final_price, 'discount' => $discount);

    
        
        return array('product_price' => 0, 'final_price' => 0, 'discount' => 0);
    }
    }
    public static function cartCount() {
        if (Auth::check()) {
            //user is looged in we will use auth
            $user_id = Auth::user()->id;
            $cartCount = DB::table('carts')->where('user_id',$user_id)->sum('quantity');
        }
        else {
            //user is not logged in we will use session
            $session_id = Session::get('session_id');
            $cartCount = DB::table('carts')->where('session_id',$session_id)->sum('quantity');
        }
       // dd($cartCount); 
        return $cartCount;
    }

    public static function getProductImage($product_id){
        $getProductImage = Product::select('product_image')->where('id',$product_id)->first()->toArray();

        return $getProductImage['product_image'];
        
    }

    
    

    
}
