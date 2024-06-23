<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VendorsBankDetails;

class VendorsBankDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vendorRecords = [
            ['id'=>1,
            'vendor_id'=>'1',
            'account_holder_name'=>'kk group',
            'bank_name'=>'Punjab national bank',
            'account_number'=>'999999999999999999',
            'bank_ifsc_code'=>'pnb2345',
            
            ],
             
        ];
        VendorsBankDetails::insert($vendorRecords); 
    }
}
