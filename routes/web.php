<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\checkoutController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\pagesController;



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
Route::get('/', 'pagesController@index');
Route::get('/home', 'pagesController@index')->name('home');
Route::get('product/{id}', 'pagesController@product');
Route::get('category/{slug}', 'pagesController@category');
Route::post('add-to-cart', [CartController::class, 'add']);
Route::delete('delete-cart-item', [CartController::class, 'deleteCart']);
Route::post('update-cart', [CartController::class, 'updateCart']);



Auth::routes();
Route::get('load-cart-data','CartController@cartcount');
Route::middleware(['auth'])->group(function () {
Route::get('cart',  'CartController@viewcart');
Route::get('checkout',[checkoutController::class,'index']);
Route::post('place-order', [checkoutController::class, 'placeorder']);
Route::post('proceed-to-pay', [checkoutController::class, 'proceedtopay']);

Route::get('user-dashboard',[UserController::class, 'index']);
Route::get('view-order/{id}', 'UserController@vieworder');
Route::get('view-profile', 'UserController@viewprofile');
Route::get('view-password', 'UserController@viewpassword');

Route::put('update-profile', 'UserController@updateprofile');
Route::post('update-password', 'UserController@changepassword');


});
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard','Admin\FrontendController@index');
    Route::get('categories', 'Admin\CategoryController@index');
    Route::get('add-category', 'Admin\CategoryController@add');
    Route::post('insert-category', 'Admin\CategoryController@insert');
    Route::get('edit/{id}', [CategoryController::class, 'edit']);
    Route::put('update-category/{id}', [CategoryController::class, 'update']);
    Route::delete('delete-category/{id}', [CategoryController::class, 'delete']);

    Route::get('products', [ProductController::class, 'index']);
    Route::get('add-products', [ProductController::class, 'create']);
    Route::post('insert-products', [ProductController::class, 'insert']);
    Route::get('edit-product/{id}', [ProductController::class, 'edit']);
    Route::put('update-product/{id}', [ProductController::class, 'update']);
    Route::delete('delete-product/{id}', [ProductController::class, 'delete']);


    Route::get('orders', 'Admin\OrdersController@index')->name('orders');
    Route::get('admin-view-order/{id}', 'Admin\OrdersController@vieworder');
    Route::put('deliver-order/{id}', 'Admin\OrdersController@deliverorder')->name('deliverorder');
    Route::get('order-history', 'Admin\OrdersController@orderhistory')->name('orderhistory');







  });
