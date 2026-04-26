<?php

use App\Containers\OrderSection\Shipping\UI\API\Controllers\ShippingController;
use App\Containers\OrderSection\Shipping\UI\API\Controllers\ShippingRateController;
use Illuminate\Support\Facades\Route;

Route::prefix('api/v1/shipping')->group(function () {
    Route::post('/calculate-fee', [ShippingController::class, 'calculateFee']);
    Route::post('/identify-rate', [ShippingController::class, 'identifyShippingRate']);

    Route::middleware(['auth:api', 'role:super-admin|p-manager'])->group(function () {
        Route::get('/rates', [ShippingRateController::class, 'index']);
        Route::post('/rates', [ShippingRateController::class, 'store']);
        Route::get('/rates/{id}', [ShippingRateController::class, 'show']);
        Route::put('/rates/{id}', [ShippingRateController::class, 'update']);
        Route::patch('/rates/{id}', [ShippingRateController::class, 'update']);
        Route::delete('/rates/{id}', [ShippingRateController::class, 'destroy']);
    });
});
