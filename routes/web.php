<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**
 * Product
 */
Route::resource('products', 'Product\ProductController');

/**
 * Cart
 */
Route::post('carts/{product}', 'Cart\CartItemController@store')->name('carts.store');