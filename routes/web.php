<?php

use Illuminate\Support\Facades\Auth;
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
Route::prefix('admin')->middleware(['role:admin|manager'])->group(function () {
    Route::get('', 'AdminController@index');

    Route::get('instant', 'AdminController@instant');

    // PRODUCTS
    Route::get('products', 'AdminController@getProducts')->name('admin.products.index');
    Route::get('products/edit/{sku}', 'AdminController@editProduct')->name('admin.products.edit');

    Route::post('products/update/{id}', 'AdminController@updateProduct')->middleware(['role:admin'])->name('admin.products.update');
    Route::get('products/add', 'AdminController@addProduct')->middleware(['role:admin'])->name('admin.products.add');
    Route::post('products/store', 'AdminController@storeProduct')->middleware(['role:admin'])->name('admin.products.store');

    // ORDERS
    Route::get('orders', 'AdminController@getOrders')->name('admin.orders.index');
    Route::get('orders/{id}', 'AdminController@showOrder')->name('admin.orders.show');
    Route::post('orders/updateorderstatus/{id}', 'AdminController@updateOrderStatus')->name('admin.orders.update');

    // USER
    Route::get('users', 'AdminController@getUsers')->name('admin.users.index');
    Route::get('users/edit/{id}', 'AdminController@editUser')->name('admin.users.edit');

    Route::post('users/update/{id}', 'AdminController@updateUser')->middleware(['role:admin'])->name('admin.users.update');
    Route::get('users/add', 'AdminController@addUser')->middleware(['role:admin'])->name('admin.users.add');
    Route::post('users/store', 'AdminController@storeUser')->middleware(['role:admin'])->name('admin.users.store');

    // REPORT
    Route::get('reports/revenue/customer', 'AdminController@getCustomerRevenueReport')->name('admin.reports.getRevenueCustomer');
    Route::post('reports/revenue/customer', 'AdminController@createCustomerRevenueReport')->name('admin.reports.createRevenueCustomer');
    Route::get('reports/revenue/product', 'AdminController@getProductRevenueReport')->name('admin.reports.getRevenueProduct');
    Route::post('reports/revenue/product', 'AdminController@createProductRevenueReport')->name('admin.reports.createRevenueProduct');
});

Auth::routes();
