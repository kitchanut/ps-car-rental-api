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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('customer_nickname')->nullable();
            $table->string('customer_sex');
            $table->string('customer_tel');
            $table->string('customer_tel_backup')->nullable();
            $table->string('customer_citizen_id')->nullable();
            $table->string('customer_citizen_expiry')->nullable();
            $table->string('customer_driver_license')->nullable();
            $table->string('customer_driver_license_expiry')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
