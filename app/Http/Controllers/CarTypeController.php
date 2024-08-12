<?php

namespace App\Http\Controllers;

use App\Models\CarType;
use Illuminate\Http\Request;

class CarTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $output = CarType::all();
        return response()->json($output);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $credentials = $request->all();
        $created = CarType::create($credentials);
        return response()->json($created, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(CarType $carType)
    {
        return response()->json($carType);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CarType $carType)
    {
        $credentials = $request->all();
        $carType->update($credentials);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CarType $carType)
    {
        $carType->delete();
    }
}
