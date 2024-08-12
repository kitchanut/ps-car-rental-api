<?php

namespace App\Http\Controllers;

use App\Models\CarModel;
use Illuminate\Http\Request;

class CarModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $output = CarModel::all();
        return response()->json($output);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $credentials = $request->all();
        $created = CarModel::create($credentials);
        return response()->json($created, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(CarModel $carModel)
    {
        return response()->json($carModel);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CarModel $carModel)
    {
        $credentials = $request->all();
        $carModel->update($credentials);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CarModel $carModel)
    {
        $carModel->delete();
    }
}
