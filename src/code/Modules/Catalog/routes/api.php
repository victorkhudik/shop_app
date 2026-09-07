<?php

use Illuminate\Support\Facades\Route;
use Modules\Catalog\Http\Controllers\Api\CategoryController;
use Modules\Catalog\Http\Controllers\Api\PopularProductController;
use Modules\Catalog\Http\Controllers\Api\RecommendedProducts;

Route::prefix('v1')->group(function () {
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::prefix('catalog')->group(function () {
        Route::get('/products/popular', [PopularProductController::class, 'index']);
        Route::get('/products/recommended', [RecommendedProducts::class, 'index']);
    });
});
