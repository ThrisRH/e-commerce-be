<?php

namespace App\Containers\AppSection\Authentication\UI\API\Routes;

use App\Containers\AppSection\Authentication\UI\API\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('api/v1/auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);

    Route::middleware('auth:api')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout']);

        Route::get('/me', [AuthController::class, 'me']);
    });

});
