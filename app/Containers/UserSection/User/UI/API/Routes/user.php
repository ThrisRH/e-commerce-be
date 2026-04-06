<?php

namespace App\Containers\UserSection\User\UI\API\Routes;

use App\Containers\UserSection\User\UI\API\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('api/v1/users')->group(function () {
    Route::get('/customers', [UserController::class, 'getCustomers']);
    Route::get('/staffs', [UserController::class, 'getStaffs']);
    Route::get('/{id}', [UserController::class, 'show']);
    Route::put('/{id}', [UserController::class, 'update']);
    Route::patch('/{id}', [UserController::class, 'update']);
    Route::delete('/{id}', [UserController::class, 'destroy']);
});
