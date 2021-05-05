<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [
    UserController::class, 'register'
]);
Route::post('login', [
    UserController::class, 'login'
]);

Route::apiResources([
    'category' => CategoryController::class,
    'products' => ProductController::class,
    'cart'=> CartController::class,
]);


//fetch all the products in a particular category
Route::get('product/{cat_id}', [
    ProductController::class, 'product'
]);

Route::post('orderProduct', [
    ProductController::class, 'orderProduct'
])->middleware('jwt.auth');
Route::get('cart', [
    CartController::class, 'cart'
])->middleware('jwt.auth');

Route::delete('cart/deleteProduct/{cart_id}', [
    CartController::class, 'deleteProduct'
])->middleware('jwt.auth');

Route::put('cart/updateCart/{cart_id}', [
    CartController::class, 'updateCart'
])->middleware('jwt.auth');


Route::post('pay', [
    UserController::class, 'register'
]);