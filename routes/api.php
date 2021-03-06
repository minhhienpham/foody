<?php

use Illuminate\Http\Request;

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

Route::group(['as' => 'api.', 'namespace' => 'Api\User'], function () {
    Route::post('register', 'LoginController@register');
    Route::apiResource('categories', 'CategoryController');
    Route::apiResource('products', 'ProductController');
    Route::apiResource('orders', 'OrderController')->middleware('auth:api');
    Route::post('login', 'LoginController@login');
    Route::get('login/gplus', 'LoginController@loginGplus');
    Route::group(['middleware' => 'auth:api'], function () {
        Route::post('logout', 'LoginController@logout');
        Route::get('checkLoginToken', 'LoginController@checkLoginToken');
        Route::put('users/profile', 'UserInfoController@update');
        Route::get('users/info', 'UserController@index');
        Route::apiResource('orders', 'OrderController');
    });
}); 
