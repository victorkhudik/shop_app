<?php

use Illuminate\Support\Facades\Route;
use Modules\Catalog\Http\Controllers\Api\CategoryController;
use Modules\Catalog\Http\Controllers\Api\Products;
use Modules\Catalog\Http\Controllers\Api\PopularProductController;
use Modules\Catalog\Http\Controllers\Api\RecommendedProducts;

Route::prefix('v1')->group(function () {
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::prefix('catalog')->group(function () {
        Route::get('products', [Products::class, 'index']);
        Route::prefix('products')->group(function () {
            Route::get('popular', [PopularProductController::class, 'index']);
            Route::get('recommended', [RecommendedProducts::class, 'index']);
        });
    });
});
