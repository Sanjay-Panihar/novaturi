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
        Schema::create('vendors_tables', function (Blueprint $table) {
            $table->id();
            $table->string('logo');
            $table->string('name');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('county');
            $table->string('pincode');
            $table->string('email')->unique();
            $table->string('status');
            $table->string('industry');
            $table->string('work');
            $table->string('other_details');
            $table->tinyInteger('vendor_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendors_tables');
    }
};
