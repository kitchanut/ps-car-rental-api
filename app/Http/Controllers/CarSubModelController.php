<?php

namespace App\Http\Controllers;

use App\Models\CarSubModel;
use Illuminate\Http\Request;

class CarSubModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $output = CarSubModel::all();
        return response()->json($output);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $credentials = $request->all();
        $created = CarSubModel::create($credentials);
        return response()->json($created, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(CarSubModel $carSubModel)
    {
        return response()->json($carSubModel);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CarSubModel $carSubModel)
    {
        $credentials = $request->all();
        $carSubModel->update($credentials);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CarSubModel $carSubModel)
    {
        $carSubModel->delete();
    }
}
