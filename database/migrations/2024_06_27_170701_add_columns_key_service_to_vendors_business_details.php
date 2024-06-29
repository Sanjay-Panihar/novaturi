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
        Schema::table('vendors_business_details', function (Blueprint $table) {
            $table->string('keyservice1', 15)->nullable();
            $table->string('keyservice2', 15)->nullable();
            $table->string('keyservice3', 15)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vendors_business_details', function (Blueprint $table) {
            $table->dropColumn(['keyservice1', 'keyservice2', 'keyservice3']);
        });
    }
};
