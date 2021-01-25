<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\BuyNowController;
use App\Http\Controllers\CartController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\StripeController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/images', [ImageController::class, 'index']);
Route::post('/cart/add', [CartController::class, 'add']);
Route::get('/cart/delete', [CartController::class, 'delete']);
Route::get('/cart/items', [CartController::class, 'getCartItems']);
Route::get('/user/stripecustomerid', [UserController::class, 'getStripeCustomerId']);
Route::post('/cart/item/update/quantity', [CartController::class, 'updateCartItemQuantity']);
Route::post('/cart/item/delete', [CartController::class, 'deleteItemFromCart']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/login/check', [LoginController::class, 'check']);
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/stripe/defaultpm', [StripeController::class, 'getDefaultPaymentMethod']);
Route::get('/stripe/paymentmethods', [StripeController::class, 'getPaymentMethods']);
Route::post('/buynow/placeorder', [BuyNowController::class, 'placeOrder']);
Route::post('/createpm', [StripeController::class, 'createPaymentMethod']);
Route::get('/addresses/default', [AddressController::class, 'getDefaultAddress']);
