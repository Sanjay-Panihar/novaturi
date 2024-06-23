<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productRecords = [
            ['id'=>1,'section_id'=>1, 'category_id'=>1, 'brand_id'=>1,
            'vendor_id'=>1, 'admin_id'=>0, 'admin_type'=>'vendor', 'product_name'=>'Blue Jeans', 
            'product_code'=>'JN12', 
            'product_color'=>'blue', 'product_price'=>1500, 'product_discount'=>10, 
            'product_weight'=>500, 'product_image'=>'',
             'product_video'=>'','description'=>'', 'meta_title'=>'', 
             'meta_description'=>'', 'meta_keywords'=>'',
             'is_featured'=>'Yes', 'product_status'=>1,],

             ['id'=>2,'section_id'=>2, 'category_id'=>2, 'brand_id'=>2,
             'vendor_id'=>1, 'admin_id'=>1, 'admin_type'=>'vendor', 'product_name'=>'Black Jeans', 
             'product_code'=>'BJN12', 
             'product_color'=>'black', 'produc t_price'=>1800, 'product_discount'=>10, 
             'product_weight'=>500, 'product_image'=>'',
              'product_video'=>'','description'=>'', 'meta_title'=>'', 
              'meta_description'=>'', 'meta_keywords'=>'',
              'is_featured'=>'Yes', 'product_status'=>1,],
        ];
        Product::insert($productRecords);
    }
}
