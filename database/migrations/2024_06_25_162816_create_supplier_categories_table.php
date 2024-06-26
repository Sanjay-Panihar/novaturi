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
        Schema::create('supplier_categories', function (Blueprint $table) {
            $table->id();
            $table->string('category_name', 255);
            $table->string('featured_category', 255);
            $table->string('cover_image', 150)->nullable();
            $table->string('category_image', 255)->nullable();
            $table->float('category_discount')->nullable();
            $table->text('description')->nullable();
            $table->string('url', 255);
            $table->string('meta_title', 255);
            $table->string('meta_description', 255);
            $table->string('meta_keywords', 255);
            $table->tinyInteger('category_status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supplier_categories');
    }
};
