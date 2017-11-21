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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// wechat
Route::any('/wechat', 'Wechat/WechatController@serve');

// shop
Route::group(['prefix' => 'shop', 'namespace' => 'Shop', 'middleware' => 'wechat.oauth'], function () {
    Route::get('/', 'ShopController@index')->name('index');
    //Route::resource('category', CategoryController::class);
});
