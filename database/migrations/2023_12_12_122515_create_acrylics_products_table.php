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
        if (!Schema::hasTable('acrylics_products')) {

        Schema::create('acrylics_products', function (Blueprint $table) {
            $table->id();
            $table->string('product_code');
            $table->string('product_price');
            $table->string('product_discount');
            $table->string('product_weight');
            $table->string('Product_size');
            $table->string('Product_thickness');
            $table->string('product_image');
            $table->timestamps();
        });
    }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acrylics_products');
    }
};
