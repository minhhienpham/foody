<?php

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
    return view('welcome');
});
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::get('logout', 'Auth\LoginController@logout')->name('logout');
});
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => 'adminLogin'], function () {
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
    Route::get('shop-manager/{manager}/stores', 'UserController@showStores')->name('shop-manager.showStores');
    Route::get('shop-manager/{manager}/products', 'UserController@showProducts')->name('shop-manager.showProducts');
    Route::resource('users', 'UserController');
    Route::get('categories/{category}/show-child', 'CategoryController@showChild')->name('categories.showChild');
    Route::resource('categories', 'CategoryController');
    Route::get('stores/{store}/show-products', 'StoreController@showProducts')->name('stores.showProducts');
    Route::resource('stores', 'StoreController');
    Route::resource('products', 'ProductController');
    Route::resource('orders', 'OrderController');
});

Route::group(['namespace' => 'Home'], function () {
    Route::get('/', 'HomeController@index')->name('user.home');
    Route::resource('products', 'ProductController');
    Route::get('/profile', 'UserController@index')->name('user.info');
    Route::get('/checkout/cart', 'CartController@index')->name('cart.info');
    Route::get('/orders','OrderController@index')->name('orders.info');
});
