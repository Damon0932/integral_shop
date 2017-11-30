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
Route::any('/wechat', 'Wechat\WechatController@serve');
Route::any('/wechat/menu', 'Wechat\WechatController@menu');

// shop
Route::group(['prefix' => 'shop', 'namespace' => 'Shop', 'middleware' => ['shop']], function () {
    Route::resource('product', ProductController::class);
    Route::resource('beans', BeansController::class);
    Route::resource('order', OrderController::class);
    Route::resource('address', AddressController::class);
    //Route::resource('category', CategoryController::class);

    Route::get("/beans/{month}/month", ["as" => "beans.month", "uses" => "BeansController@month"]);
    Route::get("/order/{productId}/pay", ["as" => "order.pay", "uses" => "OrderController@pay"]);
    Route::get("/address/{id}/set-default", ["as" => "address.set-default", "uses" => "AddressController@setDefault"]);
});
