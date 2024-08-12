<?php

namespace App\Http\Controllers;

use App\Models\CarBrand;
use Illuminate\Http\Request;

class CarBrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $output = CarBrand::with('car_models.car_sub_models')
            ->orderBy('car_brand_name', 'asc')
            ->get();
        return response()->json($output);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $credentials = $request->all();
        $created = CarBrand::create($credentials);
        return response()->json($created, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(CarBrand $carBrand)
    {
        return response()->json($carBrand);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CarBrand $carBrand)
    {
        $credentials = $request->all();
        $carBrand->update($credentials);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CarBrand $carBrand)
    {
        $carBrand->delete();
    }
}
