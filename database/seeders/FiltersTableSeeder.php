<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductsFilter;

class FiltersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filterRecords = [
            ['id'=>1,'cat_ids'=>'1,2','filter_name'=>'fabric','filter_column'=>'fabric','status'=>1]

        ];
        ProductsFilter::insert($filterRecords);
    }
}
 