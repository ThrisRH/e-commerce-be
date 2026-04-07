<?php

namespace App\Containers\PromotionSection\Promotion\UI\API\Routes;

use App\Containers\PromotionSection\Promotion\UI\API\Controllers\ProductPromotionController;
use App\Containers\PromotionSection\Promotion\UI\API\Controllers\PromotionController;
use Illuminate\Support\Facades\Route;

Route::prefix('api/v1')->group(function () {
    Route::get('promotions', [PromotionController::class, 'index']);
    Route::get('promotions/{id}', [PromotionController::class, 'show']);
    
    Route::middleware(['auth:api', 'role:super-admin|p-manager'])->group(function () {
        Route::post('promotions', [PromotionController::class, 'store']);
        Route::patch('promotions/{id}', [PromotionController::class, 'update']);
        Route::put('promotions/{id}', [PromotionController::class, 'update']);
        Route::delete('promotions/{id}', [PromotionController::class, 'destroy']);
    });
});

Route::prefix('api/v1')->group(function () {
    Route::get('product-promotions', [ProductPromotionController::class, 'index']);
    Route::middleware(['auth:api', 'role:super-admin|p-manager'])->group(function () {
        Route::post('product-promotions', [ProductPromotionController::class, 'store']);
        Route::patch('product-promotions/{id}', [ProductPromotionController::class, 'update']);
        Route::delete('product-promotions/{id}', [ProductPromotionController::class, 'destroy']);
    });
});
