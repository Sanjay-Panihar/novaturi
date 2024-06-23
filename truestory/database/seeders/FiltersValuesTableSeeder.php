<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductsFiltersValue;

class FiltersValuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filtervalueRecords = [
            ['id'=>1,'filter_id'=>1,'filter_value'=>'cotton','status'=>1],
            ['id'=>2,'filter_id'=>1,'filter_value'=>'polyster','status'=>1]
        ];
        ProductsFiltersValue::insert($filtervalueRecords);
    }
}
