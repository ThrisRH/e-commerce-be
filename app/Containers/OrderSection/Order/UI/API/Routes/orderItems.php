<?php

namespace App\Containers\OrderSection\Order\UI\API\Routes;

use App\Containers\OrderSection\Order\UI\API\Controllers\OrderItemController;
use Illuminate\Support\Facades\Route;

Route::prefix('api/v1/order-items')->group(function () {
    Route::middleware(['auth:api'])->group(function () {
        Route::get('/', [OrderItemController::class, 'index']);
    });
});
