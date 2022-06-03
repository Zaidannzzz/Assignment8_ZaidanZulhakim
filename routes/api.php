<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\PassportAuthController;
use App\Http\Controllers\API\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', [PassportAuthController::class, 'register']);
Route::post('login', [PassportAuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::get('info-user', [PassportAuthController::class, 'info']);
    // Route::resource('products', [ProdukController::class]);
    Route::get('products', [ProductController::class, 'index']);
    Route::post('products', [ProductController::class, 'store']);
    Route::get('product/{id}', [ProductController::class, 'show']);
    Route::put('product/{id}', [ProductController::class, 'update']);
    Route::delete('product/{id}', [ProductController::class, 'destroy']);
});
