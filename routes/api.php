<?php

use App\Containers\CatalogSection\Attribute\UI\API\Controllers\AttributeController;
use App\Containers\CatalogSection\Brand\UI\API\Controllers\BrandController;
use App\Containers\CatalogSection\Category\UI\API\Controllers\CategoryAttributeController;
use App\Containers\CatalogSection\Category\UI\API\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::apiResource('categories', CategoryController::class);
Route::apiResource('brands', BrandController::class);
Route::apiResource('attributes', AttributeController::class);
Route::apiResource('category-attributes', CategoryAttributeController::class);
