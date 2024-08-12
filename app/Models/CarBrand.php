<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarBrand extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function car_models()
    {
        return $this->hasMany(CarModel::class)->orderBy('car_model_name', 'asc');
    }
}
