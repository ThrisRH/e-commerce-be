<?php

namespace App\Containers\OrderSection\Order\UI\API\Routes;

use App\Containers\OrderSection\Order\UI\API\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::prefix('api/v1/orders')->group(function () {
    Route::get('/', [OrderController::class, 'index']);
    Route::post('/', [OrderController::class, 'store']);
});
