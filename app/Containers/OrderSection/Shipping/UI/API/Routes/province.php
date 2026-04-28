<?php

use App\Containers\OrderSection\Shipping\UI\API\Controllers\ShippingProvinceController;
use Illuminate\Support\Facades\Route;

Route::prefix('api/v1/shipping')->group(function () {
    Route::get('provinces', [ShippingProvinceController::class, 'index']);
    Route::post('provinces', [ShippingProvinceController::class, 'store']);
    Route::patch('provinces/{id}', [ShippingProvinceController::class, 'update']);
    Route::put('provinces/{id}', [ShippingProvinceController::class, 'update']);
    Route::delete('provinces/{id}', [ShippingProvinceController::class, 'delete']);
});
