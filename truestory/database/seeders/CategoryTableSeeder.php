<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoryRecords = [
            ['id'=>1,
            'parent_id'=>'0',
            'section_id'=>1,
            'category_name'=>'Men',
            'category_image'=>'',
            'category_discount'=>0,
            'description'=>'',
            'url'=>'men',
            'meta_title'=>'',
            'meta_description'=>'',
            'meta_Keywords'=>'',
            'category_status'=>'1'
            ],
            ['id'=>2,
            'parent_id'=>'0',
            'section_id'=>1,
            'category_name'=>'Women',
            'category_image'=>'',
            'category_discount'=>0,
            'description'=>'',
            'url'=>'women',
            'meta_title'=>'',
            'meta_description'=>'',
            'meta_Keywords'=>'',
            'category_status'=>'1'
            ]

        ];
        Category::insert($categoryRecords);
    }
}
