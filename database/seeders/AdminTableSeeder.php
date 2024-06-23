<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Hash;

class AdminTableSeeder extends Seeder
{

    public function run(): void
    {
        $adminRecords = [
            ['id'=>1, 'name'=>'Super_admin', 'type'=>'superadmin', 
            'vendor_id'=> 0, 'mobile'=>'9999999909', 'image'=>'', 'confirm'=>'Yes','address'=>'maincity,roorkee', 'city'=>'roorkee', 'state'=>'uttrakhand',
            'Country'=>'india','pincode'=>'848784',
            'password' => Hash::make('12345678'), 'email'=>'rahul@gmail.com', 'admin_status'=>'1'],
            
            ['id'=>2, 'name'=>'vinay', 'type'=>'vendor', 
            'vendor_id'=> 1, 'mobile'=>'9999999909', 'image'=>'', 'confirm'=>'Yes', 'address'=>'mumbai', 'city'=>'patna', 'state'=>'bihar',
            'Country'=>'india','pincode'=>'848484',
           'password' => Hash::make('123456789'), 'email'=>'vinay@gmail.com', 'admin_status'=>'0'],


           
        ];
        Admin::insert($adminRecords);
    }
}
