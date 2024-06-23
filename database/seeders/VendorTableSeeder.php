<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vendor;
use Hash;

class VendorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vendorRecords = [
            ['id'=>1,
             'name'=>'vinay', 
             'confirm'=>'Yes',
             'mobile'=>'9999999909', 
             'email'=>'vinay@gmail.com',
             'address'=>'mumbai', 'city'=>'patna', 'state'=>'bihar',
            'Country'=>'india','pincode'=>'848484','image'=>'',
             'vendor_status'=>'1'],
        ];
        Vendor::insert($vendorRecords);
            
    }
}
