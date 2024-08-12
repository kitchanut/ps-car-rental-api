<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function car_type()
    {
        return $this->belongsTo(CarType::class);
    }

    public function car_brand()
    {
        return $this->belongsTo(CarBrand::class);
    }

    public function car_model()
    {
        return $this->belongsTo(CarModel::class);
    }

    public function car_sub_model()
    {
        return $this->belongsTo(CarSubModel::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}
