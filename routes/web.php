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
Route::get('carts', 'Cart\CartItemController@index')->name('carts.index');
Route::post('carts/{product}', 'Cart\CartItemController@store')->name('carts.store');
Route::patch('carts/{product}', 'Cart\CartItemController@update')->name('carts.update');
Route::delete('carts/{product}', 'Cart\CartItemController@destroy')->name('carts.destroy');