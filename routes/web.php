<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Pages route
Route::get('', 'PagesController@index');
Route::get('about', 'PagesController@about');
Route::get('contact', 'PagesController@contact');

// Product route
Route::get('products', 'ProductsController@index');
Route::get('products/{sku}', 'ProductsController@show');

// User route
Route::prefix('user')->middleware(['auth'])->group(function () {
    Route::get('', function () {
        return redirect()->route('user.profile');
    });
    Route::get('profile', 'UsersController@index')->name('user.profile');
    Route::get('changepassword', 'UsersController@changePassword')->name('user.changepassword');
    Route::post('updatepassword', 'UsersController@updatePassword')->name('user.updatepassword');
    Route::post('update', 'UsersController@update');
    Route::get('orders', 'OrdersController@index')->name('user.orders');
    Route::get('orders/{id}', 'OrdersController@show')->name('user.orders.show');
});

// Cart route
Route::get('cart', 'CartsController@index');
Route::get('cart/processcheckout', 'CartsController@processCheckout')->middleware('auth');

// Cart AJAX
Route::get('cart/totalcart', 'CartsController@getTotalCart')->middleware('auth');
Route::post('cart/addtocart', 'CartsController@addToCart')->middleware('auth');
Route::post('cart/updatecart', 'CartsController@updateCart')->middleware('auth');
Route::post('cart/removefromcart', 'CartsController@removeFromCart')->middleware('auth');

// Order
Route::post('orders/create', 'OrdersController@create')->middleware('auth');
Route::post('orders/cancelorder', 'OrdersController@cancelOrder')->middleware('auth');

// Admin
Route::prefix('admin')->middleware(['role:admin'])->group(function() {
    Route::get('', function() {
        echo 'Hello Admin';
    });

    Route::get('products', 'AdminController@getProducts')->name('admin.products.index');
    Route::get('products/add', 'AdminController@addProduct')->name('admin.products.add');
    Route::get('products/edit/{sku}', 'AdminController@editProduct')->name('admin.products.edit');
    Route::post('products/store', 'AdminController@storeProduct')->name('admin.products.store');
    Route::post('products/update/{id}', 'AdminController@updateProduct')->name('admin.products.update');
});

Auth::routes();
