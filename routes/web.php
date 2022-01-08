<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/checkout','App\Http\Controllers\CheckoutController@checkout');

Route::get('/viewCart','App\Http\Controllers\CartController@display');

Route::get('/confirmorder','App\Http\Controllers\OrderController@orderdetails');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/allProducts','App\Http\Controllers\AllProductController@displayProducts');

Route::get('/lips','App\Http\Controllers\ProductController@LipsItems');

Route::get('/face/foundations','App\Http\Controllers\ProductController@FoundationItems');

Route::get('/eyes','App\Http\Controllers\ProductController@EyesItems');

Route::get('/face/concealers','App\Http\Controllers\ProductController@concealers');

Route::get('/face/primers','App\Http\Controllers\ProductController@primers');
Route::get('/face/serums','App\Http\Controllers\ProductController@serums');

Route::get('/face/highlighters','App\Http\Controllers\ProductController@highlighters');

Route::get('/sort', 'App\Http\Controllers\AllProductController@sort');

Route::get('/product/{id}','App\Http\Controllers\ProductController@product');

Route::get('/viewCart/{id}','App\Http\Controllers\CartController@viewcart');

Route::get('/removefrmCart/{id}','App\Http\Controllers\CartController@removefrmCart');


