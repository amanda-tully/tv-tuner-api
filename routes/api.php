<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/sanctum/csrf-cookie', function(){
    return response()->json();
});

Route::post('/login', [LoginController::class, 'login']);

Route::get('/test', function (Request $request) {
    return response()->json(['message' => 'Test route successful!']);
});

Route::middleware(['auth:sanctum'])->group(function () {});
