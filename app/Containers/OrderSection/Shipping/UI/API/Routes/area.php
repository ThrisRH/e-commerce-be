<?php

use App\Containers\OrderSection\Shipping\UI\API\Controllers\ShippingAreaController;
use Illuminate\Support\Facades\Route;

Route::prefix('api/v1/shipping')->group(function () {
    Route::get('areas', [ShippingAreaController::class, 'index']);
    Route::post('areas', [ShippingAreaController::class, 'store']);
    Route::patch('areas/{id}', [ShippingAreaController::class, 'update']);
    Route::put('areas/{id}', [ShippingAreaController::class, 'update']);
    Route::delete('areas/{id}', [ShippingAreaController::class, 'delete']);
});
