<?php

namespace App\Containers\AppSection\Authorization\UI\API\Routes;

use App\Containers\AppSection\Authorization\UI\API\Controllers\AuthorizationController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:api', 'role:super-admin'])->group(function () {
    Route::get('api/v1/roles', [AuthorizationController::class, 'index']);
    Route::post('api/v1/roles', [AuthorizationController::class, 'store']);

    Route::get('api/v1/roles/{id}', [AuthorizationController::class, 'show']);
    Route::put('api/v1/roles/{id}', [AuthorizationController::class, 'update']);
    Route::patch('api/v1/roles/{id}', [AuthorizationController::class, 'update']);
    Route::delete('api/v1/roles/{id}', [AuthorizationController::class, 'destroy']);
});
