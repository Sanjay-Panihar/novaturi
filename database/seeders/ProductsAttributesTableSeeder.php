<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductsAttribute;

class ProductsAttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productAttributesRecords = [
            ['id'=>1,'product_id'=>2,'size'=>'Small','price'=>1800,
            'stocks'=>10,'sku'=>'P-2-s','status'=>1],
            
        ];
        ProductsAttribute::insert($productAttributesRecords);
    }
}
