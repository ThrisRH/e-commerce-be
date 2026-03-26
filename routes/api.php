<?php

use App\Containers\CatalogSection\Attribute\UI\API\Controllers\AttributeController;
use App\Containers\CatalogSection\Brand\UI\API\Controllers\BrandController;
use App\Containers\CatalogSection\Category\UI\API\Controllers\CategoryController;
use App\Containers\CatalogSection\Product\UI\API\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\CategoryAttributeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use Illuminate\Support\Facades\Route;

Route::apiResource('products', ProductController::class);
Route::apiResource('categories', CategoryController::class);
Route::apiResource('carts', CartController::class);
Route::apiResource('cart-items', CartItemController::class);
Route::apiResource('orders', OrderController::class);
Route::apiResource('order-items', OrderItemController::class);
Route::apiResource('brands', BrandController::class);
Route::apiResource('attributes', AttributeController::class);
Route::apiResource('category-attributes', CategoryAttributeController::class);
