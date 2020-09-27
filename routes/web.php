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

Route::get('/', 'PagesController@index');
Route::get('/products', 'ProductsController@index');
Route::get('/products/{sku}', 'ProductsController@show');
// Route::get('/products', 'ProductsController@index');
// Route::get('/products', 'ProductsController@index');

// Route::get('users', 'UsersController@index')->middleware('auth');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
