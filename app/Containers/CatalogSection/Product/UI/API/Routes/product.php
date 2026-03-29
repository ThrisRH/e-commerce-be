<?php

namespace App\Containers\CatalogSection\Product\UI\API\Routes;

use App\Containers\CatalogSection\Product\UI\API\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('api/v1/products', [ProductController::class, 'index']);
Route::get('api/v1/products/{id}', [ProductController::class, 'show']);

Route::middleware(['check.token'])->group(function () {
    Route::post('api/v1/products', [ProductController::class, 'store']);
    Route::put('api/v1/products/{id}', [ProductController::class, 'update']);
    Route::delete('api/v1/products/{id}', [ProductController::class, 'destroy']);
});
