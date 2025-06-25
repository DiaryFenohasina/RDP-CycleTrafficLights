<?php

use App\Http\Controllers\TrafficController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/traffic', [TrafficController::class, 'getPosition']);

