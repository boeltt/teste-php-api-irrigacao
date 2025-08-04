<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PivotController;
use App\Http\Controllers\IrrigationController;
use App\Http\Controllers\AuthController;

Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);

Route::middleware('jwt')->group(function () {
    Route::apiResource('pivots', PivotController::class);
    Route::apiResource('irrigations', IrrigationController::class)->except(['update']);
});
