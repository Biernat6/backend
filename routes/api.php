<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//----------Products-------------//
use App\Http\Controllers\ProductController;

Route::get('/products', [ProductController::class, 'index']);

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
