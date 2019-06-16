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
 * CartAddress
 */
Route::post('carts/address', 'Cart\CartAddressController@store')->name('carts.addresses.store');

/**
 * CartItem
 */
Route::get('carts', 'Cart\CartItemController@index')->name('carts.index');
Route::delete('carts', 'Cart\CartItemController@empty')->name('carts.empty');
Route::post('carts/{product}', 'Cart\CartItemController@store')->name('carts.store');
Route::patch('carts/{product}', 'Cart\CartItemController@update')->name('carts.update');
Route::delete('carts/{product}', 'Cart\CartItemController@destroy')->name('carts.destroy');


/**
 * Order
 */
Route::resource('orders', 'Order\OrderController');


/**
 * Payment
 */
Route::post('purchases', 'Purchase\PurchaseController@store')->name('purchases.store');
Route::get('purchases/create', 'Purchase\PurchaseController@create')->name('purchases.create');
