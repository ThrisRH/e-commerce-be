<?php

namespace App\Containers\CatalogSection\Product\UI\API\Routes;

use App\Containers\CatalogSection\Product\UI\API\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::prefix('api/v1/products')->group(function () {
    Route::post('/', [ProductController::class, 'store']);
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/by-cate', [ProductController::class, 'showByCate']);
    Route::get('/search', [ProductController::class, 'findProductByKeyword']);
    // Route::get('/{id}', [ProductController::class, 'show']);
    Route::get('/{slug}', [ProductController::class, 'getProductBySlug']);

    Route::middleware(['auth:api', 'role:super-admin|p-manager'])->group(function () {
        Route::post('/variants', [ProductController::class, 'storeVariant']);
        Route::get('/admin/{slug}', [ProductController::class, 'adminIndex']);
        Route::match(['put', 'patch'], '/{id}', [ProductController::class, 'update']);
        Route::patch('/items/{id}', [ProductController::class, 'updateProductItem']);
        Route::patch('/variants/{id}', [ProductController::class, 'updateProductVariant']);
        Route::delete('/{id}', [ProductController::class, 'destroy']);
        Route::delete('/variants/{id}', [ProductController::class, 'deleteProductVariant']);
    });
});
