<?php

namespace App\Containers\AppSection\Authorization\UI\API\Routes;

use App\Containers\AppSection\Authorization\UI\API\Controllers\AuthorizationController;
use Illuminate\Support\Facades\Route;

Route::prefix('api/v1')->group(function () {
    Route::middleware(['auth:api', 'role:super-admin'])->group(function () {
        Route::get('roles', [AuthorizationController::class, 'index']);
        Route::post('roles', [AuthorizationController::class, 'store']);

        Route::get('roles/{id}', [AuthorizationController::class, 'show']);
        Route::put('roles/{id}', [AuthorizationController::class, 'update']);
        Route::patch('roles/{id}', [AuthorizationController::class, 'update']);
        Route::delete('roles/{id}', [AuthorizationController::class, 'destroy']);
    });
});
