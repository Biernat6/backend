<?php



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//----------Products-------------//
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;

//----------Products-------------//
Route::get('/products', [ProductController::class, 'index']); //Działa
Route::post('/addProduct', [ProductController::class, 'addProduct']); //Działa
Route::put('/modifiedProduct/{product_id}', [ProductController::class, 'modifiedProduct']); // Działa
Route::delete('/deleteProduct/{product_id}', [ProductController::class, 'deleteProduct']); // Działa
Route::put('/updateProduct/{product_id}', [ProductController::class, 'update']); // Działa
Route::get('/findProduct/{product_id}', [ProductController::class, 'find']); // Działa

//----------Auth-------------//
// Route::get('/auth', [AuthController::class, 'index']);
Route::post('/register', [AuthController::class, 'register']); // Działa
Route::post('/login', [AuthController::class, 'login']); // Działa
Route::post('/logout', [AuthController::class, 'logout']); //Działa
Route::put('/changePassword', [AuthController::class, 'changePassword']); //Działa

//----------Category-------------//
Route::get('/indexCategory', [CategoryController::class, 'index']); //Działa
Route::get('/findProductsByCategory/{category_id}', [CategoryController::class, 'findProductsByCategory']); // Działa
Route::post('/createCategory', [CategoryController::class, 'create']); // Działa
Route::delete('/destroyCategory/{category_id}', [CategoryController::class, 'destroy']); // Działa
Route::put('/updateCategory/{category_id}', [CategoryController::class, 'update']); // Działa
Route::post('/addProductToCategory/{category_id}', [CategoryController::class, 'addProductToCategory']); // Działa

//----------Order-------------//
Route::get('/indexOrder', [OrderController::class, 'index']); // Działa
Route::post('/createOrder', [OrderController::class, 'create']); // Działa
Route::put('/updateOrder/{order_id}', [OrderController::class, 'update']); // Działa
Route::delete('/destroyOrder/{order_id}', [OrderController::class, 'destroy']);// Działa 
Route::get('/findOrder/{order_id}', [OrderController::class, 'find']);// Działa

//----------User-------------//
Route::post('/findUser/{user_id}', [UserController::class, 'find']);// Działa
Route::put('/updateUser/{user_id}', [UserController::class, 'update']);// Działa
Route::delete('/destroyUser/{user_id}', [UserController::class, 'destroy']);// Działa
Route::get('/indexUser', [UserController::class, 'index']);// Działa


Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
