<?php

namespace App\Containers\HomeSection\Category\UI\API\Routes;

use App\Containers\HomeSection\Category\UI\API\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('api/v1/home-getting', [HomeController::class, 'index']);
