<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;

Route::get('/', function () {
    return response()->json(['status' => true]);
});

Route::get('login', function () {
    abort(401);
})->name('login');

Route::post('login', function (Request $request) {
    $credentials = $request->only(['email', 'password']);
    $user = User::where('email', $credentials['email'])->first();
    if ($user) {
        if (Hash::check($credentials['password'], $user->password)) {
            $user->tokens()->delete();
            $token = $user->createToken($request->tokenName);
            $res = explode("|", $token->plainTextToken);
            return response()->json(['status' => true, 'token' => $res[1], 'user' => $user]);
        } else {
            return response()->json(['status' => false], 401);
        }
    } else {
        return response()->json(['status' => false], 401);
    }
});

Route::apiResource('users', UserController::class);
Route::apiResource('branches', BranchController::class);
Route::apiResource('customers', CustomerController::class);

Route::group(['middleware' => 'auth:sanctum'], function () {
});
