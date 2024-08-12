<?php

use App\Models\Branch;
use App\Models\CarBrand;
use App\Models\CarModel;
use App\Models\CarSubModel;
use App\Models\CarType;
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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Branch::class);
            $table->foreignIdFor(CarType::class);
            $table->foreignIdFor(CarBrand::class);
            $table->foreignIdFor(CarModel::class);
            $table->foreignIdFor(CarSubModel::class)->nullable();
            $table->string('license_plate');
            $table->string('license_plate_province');
            $table->string('year');
            $table->string('color');
            $table->string('rental_per_day');
            $table->string('driver_per_day');
            $table->string('deposit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
