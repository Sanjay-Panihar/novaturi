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
        Schema::create('vendors_bank_details', function (Blueprint $table) {
            $table->id();
            $table->integer('vendor_id');//
            $table->string('account_holder_name');//1
            $table->string('bank_name');//2
            $table->string('account_number');//3
            $table->string('bank_ifsc_code')->nullable();//4
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendors_bank_details');
    }
};
