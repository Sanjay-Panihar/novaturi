<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vendors_business_details', function (Blueprint $table) {
            $table->id(); //
            $table->integer('vendor_id');//
            $table->string('Business_name');//1
            $table->string('Brand_name');//2
            $table->string('Business_Category');//3
            $table->string('Business_catalogue')->nullable();//4
            $table->string('product_sample')->nullable();//5
            $table->string('Business_gst');//6
            $table->string('Gst_number')->nullable();//7
            $table->string('email');//8
            $table->string('Country');//9
            $table->string('state');//10
            $table->string('city');//11
            $table->string('product_photos');//12
            $table->string('sell_in_wholesale');//13
            $table->string('moq_of_product');//14
            $table->string('usp_and_specialservice')->nullable();//15
            $table->string('socialmedia_link')->nullable();//16
            $table->string('websitelink')->nullable();//17
            $table->string('delivery_time');//18
            $table->string('certificate')->nullable();//19
            $table->string('sustainability_practices');//20

            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendors_business_details');
    }
};
