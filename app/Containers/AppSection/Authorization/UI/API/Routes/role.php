<?php

namespace App\Containers\CatalogSection\Product\UI\API\Routes;

use App\Containers\AppSection\Authorization\UI\API\Controllers\AuthorizationController;
use Illuminate\Support\Facades\Route;

Route::get('api/v1/roles', [AuthorizationController::class, 'index']);
Route::post('api/v1/roles', [AuthorizationController::class, 'store']);

Route::middleware(['check.token'])->group(function () {

    Route::put('api/v1/roles/{id}', [AuthorizationController::class, 'update']);
    Route::delete('api/v1/roles/{id}', [AuthorizationController::class, 'destroy']);
});
