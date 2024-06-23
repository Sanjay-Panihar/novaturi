<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DeliveryAddress;


class DeliveryAddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */    
    public function run(): void
    {
        $deliveryRecords = [
            ['id'=>3, 'user_id'=>1, 'name'=>'amit singh','address'=>'ward-no-9','city'=>'darbhanga','state'=>'Bihar',
            'country'=>'india','pincode'=>'847214','mobile'=>'9999988889' ,'status'=>'1'],
            ['id'=>4, 'user_id'=>1, 'name'=>'kajal singh','address'=>'ward-no-2','city'=>'jainagar','state'=>'Bihar',
            'country'=>'india','pincode'=>'847210','mobile'=>'9999985889' ,'status'=>'1']
        ];
        DeliveryAddress::insert($deliveryRecords);
    
    }
}
