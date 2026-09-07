<?php

use Illuminate\Support\Facades\Route;
use Modules\Sales\Http\Controllers\Api\OrderController;

Route::prefix('v1/sales')->group(function () {
    Route::post('/orders', [OrderController::class, 'store']);
    Route::get('/orders/{uuid}', [OrderController::class, 'show']);
    Route::post('/orders/{uuid}/pay', [OrderController::class, 'pay']);
});
