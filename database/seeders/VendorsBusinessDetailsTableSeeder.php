<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VendorsBusinessDetails;


class VendorsBusinessDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vendorRecords = [
            ['id'=>1,
            'vendor_id'=>'1',
            'Business_name'=>'kk group',
            'Brand_name'=>'kk',
            'Business_Category'=>'sustainability_practices',
            'Business_catalogue'=>'T-Shirts',
            'product_sample'=>'T-Shirts',
            'Business_gst'=>'Yes',
            'Gst_number'=>'873434793747347893473',
            'email'=>'kk@gmail.com',
            'Country'=>'india',
            'state'=>'Delhi',
            'city'=>'Delhi',
            'product_photos'=>'',
            'sell_in_wholesale'=>'Yes',
            'moq_of_product'=>'10-20',
            'usp_and_specialservice'=>'best seller, hard working, many products',
            'socialmedia_link'=>'kkfacebook.com',
            'websitelink'=>'kkproducts.com',
            'delivery_time'=>'10 days',
            'certificate'=>'',
            'sustainability_practices'=>'Yes',
            ],
             
        ];
        VendorsBusinessDetails::insert($vendorRecords); 
    }
}
