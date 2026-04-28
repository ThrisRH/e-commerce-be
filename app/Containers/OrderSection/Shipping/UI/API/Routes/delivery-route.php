<?php

use App\Containers\OrderSection\Shipping\UI\API\Controllers\ShippingRouteController;
use Illuminate\Support\Facades\Route;

Route::prefix('api/v1/shipping')->group(function () {
    Route::get('routes', [ShippingRouteController::class, 'index']);
    Route::post('routes', [ShippingRouteController::class, 'store']);
    Route::post('routes/find', [ShippingRouteController::class, 'findByRoute']);
    Route::patch('routes/{id}', [ShippingRouteController::class, 'update']);
    Route::put('routes/{id}', [ShippingRouteController::class, 'update']);
    Route::delete('routes/{id}', [ShippingRouteController::class, 'delete']);
});
