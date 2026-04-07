<?php

namespace App\Containers\OrderSection\Order\UI\API\Routes;

use App\Containers\OrderSection\Order\UI\API\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::prefix('api/v1/orders')->group(function () {
    Route::post('/', [OrderController::class, 'store']);
    Route::get('/search', [OrderController::class, 'search']);

    Route::middleware(['auth:api'])->group(function () {
        Route::get('/{id}', [OrderController::class, 'show']);
        Route::get('/stats/revenue/weekly', [OrderController::class, 'weeklyRevenue']);

        Route::middleware(['role:super-admin|o-manager'])->group(function () {
            Route::get('/', [OrderController::class, 'index']);
            Route::patch('/{id}', [OrderController::class, 'update']);
        });
    });
});
