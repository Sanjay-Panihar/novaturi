<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
      // $this->call(AdminTableSeeder::class);
       //$this->call(SectionTableseeder::class);
       //$this->call(CategoryTableSeeder::class);
       //$this->call(VendorTableSeeder::class);
      // $this->call(VendorsBusinessDetailsTableSeeder::class);
       //$this->call(VendorsBankDetailsTableSeeder::class);
       //$this->call(BrandsTableSeeder::class);
       //$this->call(ProductsTableSeeder::class);
      //$this->call(ProductsAttributesTableSeeder::class);  
        //$this->call(FiltersTableSeeder::class);
       // $this->call(FiltersValuesTableSeeder::class);
       $this->call(DeliveryAddressTableSeeder::class);
       
        
         
        
     
    }
}
