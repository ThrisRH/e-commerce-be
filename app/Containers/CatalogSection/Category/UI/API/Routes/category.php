<?php

namespace App\Containers\CatalogSection\Category\UI\API\Routes;

use App\Containers\CatalogSection\Category\UI\API\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('api/v1/categories')->group(function () {
    Route::get('/', [CategoryController::class, 'index']);

    Route::middleware(['auth:api', 'role:super-admin|p-manager'])->group(function () {
        Route::post('/', [CategoryController::class, 'store']);
        Route::put('/{id}', [CategoryController::class, 'update']);
        Route::patch('/{id}', [CategoryController::class, 'update']);
        Route::delete('/{id}', [CategoryController::class, 'destroy']);
    });

    Route::get('/search', [CategoryController::class, 'findCateByName']);
    Route::get('/slug/{slug}', [CategoryController::class, 'findBySlug']);
    Route::get('/{id}', [CategoryController::class, 'show']);
    Route::get('/{id}/products', [CategoryController::class, 'showByCateId']);
});
