<?php

use App\Containers\CatalogSection\Attribute\UI\API\Controllers\AttributeController;
use App\Containers\CatalogSection\Attribute\UI\API\Controllers\AttributeValueController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->group(function () {
    Route::prefix('api/v1/attributes')->group(function () {
        Route::get('/', [AttributeController::class, 'index']);
        Route::post('/', [AttributeController::class, 'store']);
        Route::get('/{id}', [AttributeController::class, 'show']);
        Route::put('/{id}', [AttributeController::class, 'update']);
        Route::delete('/{id}', [AttributeController::class, 'destroy']);
    });

    Route::prefix('api/v1/attribute-values')->group(function () {
        Route::get('/', [AttributeValueController::class, 'index']);
        Route::post('/', [AttributeValueController::class, 'store']);
        Route::put('/{id}', [AttributeValueController::class, 'update']);
        Route::patch('/{id}', [AttributeValueController::class, 'update']);
        Route::delete('/{id}', [AttributeValueController::class, 'destroy']);
    });
});
