<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function car_brand()
    {
        return $this->belongsTo(CarBrand::class);
    }

    public function car_sub_models()
    {
        return $this->hasMany(CarSubModel::class)->orderBy('car_sub_model_name', 'asc');
    }
}
