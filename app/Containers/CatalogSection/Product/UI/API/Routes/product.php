<?php

namespace App\Containers\CatalogSection\Product\UI\API\Routes;

use App\Containers\CatalogSection\Product\UI\API\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::prefix('api/v1/products')->group(function () {
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/by-cate', [ProductController::class, 'showByCate']);
    Route::get('/search', [ProductController::class, 'findProductByKeyword']);
    Route::get('/{id}', [ProductController::class, 'show']);

    Route::middleware(['auth:api', 'role:super-admin|p-manager'])->group(function () {
        Route::post('/', [ProductController::class, 'store']);
        Route::match(['put', 'patch'], '/{id}', [ProductController::class, 'update']);
        Route::delete('/{id}', [ProductController::class, 'destroy']);
    });
});
