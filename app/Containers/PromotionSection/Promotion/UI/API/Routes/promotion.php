<?php

namespace App\Containers\PromotionSection\Promotion\UI\API\Routes;

use App\Containers\PromotionSection\Promotion\UI\API\Controllers\ProductPromotionController;
use App\Containers\PromotionSection\Promotion\UI\API\Controllers\PromotionController;
use Illuminate\Support\Facades\Route;

Route::prefix('api/v1')->group(function () {
    Route::apiResource('promotions', PromotionController::class);
});

Route::prefix('api/v1')->group(function () {
    Route::apiResource('product-promotions', ProductPromotionController::class);
});
