<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Section;

class SectionTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sectionRecords = [
            ['id'=>1,'name'=>'T-Shirts','section_status'=>1],
            ['id'=>2,'name'=>'Full Sleeves T-shirt','section_status'=>1],
            ['id'=>3,'name'=>'Sweatshirt','section_status'=>1],
            ['id'=>4,'name'=>'Hoodies','section_status'=>1],
            ['id'=>5,'name'=>'Drop Shoulder','section_status'=>1],
            ['id'=>6,'name'=>'Women Tshirt Top ','section_status'=>1],  
        ];
        Section::insert($sectionRecords); 
    }
}