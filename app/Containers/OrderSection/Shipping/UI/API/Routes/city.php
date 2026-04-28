<?php

use App\Containers\OrderSection\Shipping\UI\API\Controllers\ShippingCityController;
use Illuminate\Support\Facades\Route;

Route::prefix('api/v1/shipping')->group(function () {
    Route::get('cities', [ShippingCityController::class, 'index']);
    Route::post('cities', [ShippingCityController::class, 'store']);
    Route::patch('cities/{id}', [ShippingCityController::class, 'update']);
    Route::put('cities/{id}', [ShippingCityController::class, 'update']);
    Route::delete('cities/{id}', [ShippingCityController::class, 'delete']);
});
