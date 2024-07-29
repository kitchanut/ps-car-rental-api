<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $output = User::all();
        return response()->json($output);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $credentials = $request->only(['name', 'email', 'password', 'status']);
        $credentials['password'] = Hash::make($credentials['password']);
        $user = User::where('email', $credentials['email'])->first();
        if ($user) {
            return response()->json([
                'status' => false,
            ], 400);
        } else {
            $user = User::create($credentials);
            return response()->json([
                'status' => true,
            ], 201);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $credentials = $request->all();
        if (isset($credentials['password'])) {
            $credentials['password'] = Hash::make($credentials['password']);
        } else {
            unset($credentials['password']);
        }
        $userCheck = User::where([['id', '!=', $credentials['id']], ['email', $credentials['email']]])->first();
        if ($userCheck) {
            return response()->json([
                'status' => false,
            ], 400);
        } else {
            $user->update($credentials);
            return response()->json([
                'status' => true,
                'updated' => $credentials
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
    }
}
