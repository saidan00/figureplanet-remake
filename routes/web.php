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
Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/contact', 'PagesController@contact');

// Product route
Route::get('/products', 'ProductsController@index');
Route::get('/products/{sku}', 'ProductsController@show');

// User route
Route::middleware(['auth'])->group(function () {
    Route::get('/user', function () {
        return redirect('/user/profile');
    });
    Route::get('/user/profile', 'UsersController@index')->name('user.profile');
    Route::get('/user/changepassword', 'UsersController@changePassword')->name('user.changepassword');
    Route::get('/user/orders', 'UsersController@index')->name('user.orders');
    Route::post('/user/updatepassword', 'UsersController@updatePassword')->name('user.updatepassword');
    Route::post('/user/update', 'UsersController@update');
});

// Cart route
Route::get('/cart', 'CartsController@index');

Auth::routes();
