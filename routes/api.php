<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('principal', \App\Http\Controllers\PrincipalController::class);
Route::apiResource('services', \App\Http\Controllers\ServicesController::class);
Route::apiResource('events', \App\Http\Controllers\EventsController::class);
Route::apiResource('aboutme', \App\Http\Controllers\AboutmeController::class);
