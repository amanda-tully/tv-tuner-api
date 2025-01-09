<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::options('{any}', function () {
    return response()->json([], 204);
})->where('any', '.*');

Route::middleware('api')->group(function () {
    Route::get('/test', function () {
        return response()->json(['message' => 'CORS tested!']);
    });
});

Route::get('/sanctum/csrf-cookie', function(){
    return response()->json();
});

Route::post('/login', [LoginController::class, 'login']);
//Route::middleware(['auth:sanctum'])->group(function () {});
