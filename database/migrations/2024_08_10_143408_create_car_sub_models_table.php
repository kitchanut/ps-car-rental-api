<?php

use App\Models\CarModel;
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
        Schema::create('car_sub_models', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(CarModel::class);
            $table->string('car_sub_model_name');
            $table->string('car_sub_model_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_sub_models');
    }
};
