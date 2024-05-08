<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//----------Products-------------//
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;


Route::get('/products', [ProductController::class, 'index']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
