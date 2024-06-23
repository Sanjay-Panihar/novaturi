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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->integer('vendor_id');
            $table->string('address')->default('Null');
            $table->string('city')->default('Null');
            $table->string('state')->default('Null');
            $table->string('Country')->default('Null');
            $table->string('pincode')->default('Null');
            $table->string('image')->default('Null');
            $table->string('confirm')->default('No');
            $table->string('mobile');
            $table->string('password');
            
            $table->string('email')->unique();
            $table->tinyInteger('admin_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
