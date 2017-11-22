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

// backend
Route::get('/home', 'HomeController@index')->name('home');

// wechat
Route::any('/wechat', 'Wechat/WechatController@serve');

//// shop
Route::group(['prefix' => 'shop', 'namespace' => 'Shop', 'middleware' => ['shop']], function () {
    Route::resource('product', ProductController::class);
    //Route::resource('category', CategoryController::class);
});
