<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $output = Branch::all();
        return response()->json($output);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $credentials = $request->all();
        $created = Branch::create($credentials);
        return response()->json($created, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Branch $branch)
    {
        return response()->json($branch);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Branch $branch)
    {
        $credentials = $request->all();
        $branch->update($credentials);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Branch $branch)
    {
        $branch->delete();
    }
}
