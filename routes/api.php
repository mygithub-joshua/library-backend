<?php

use App\Http\Controllers\API\ProductCategoryController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\TransactionController;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//ROUTE PRODUCT// Kalo mau test query API di postman, get diganti post
Route::get('products', [ProductController::class, 'all']);
Route::get('categories', [ProductCategoryController::class, 'all']);

//ROUTE REGISTER// Kalo mau test query API di postman, get diganti post
Route::post('register', [UserController::class, 'register']);

//ROUTE LOGIN// Kalo mau test query API di postman, get diganti post
Route::post('login', [UserController::class, 'login']);

//ROUTE USER// Kalo mau test query API di postman, get diganti post
Route::middleware('auth:sanctum')->group(function(){
    Route::post('user', [UserController::class, 'fetch']);
    Route::post('user', [UserController::class, 'updateProfile']);
    Route::post('logout', [UserController::class, 'logout']);

    Route::get('transactions', [TransactionController::class, 'all']);
    Route::post('checkout', [TransactionController::class, 'checkout']);
});
