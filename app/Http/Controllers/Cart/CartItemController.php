<?php

namespace App\Http\Controllers\Cart;

use App\Product;
use App\Facades\ShoppingCart;
use App\Http\Requests\CartRequest;
use App\Http\Controllers\Controller;

class CartItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartItems = ShoppingCart::fromSession()->except('address');

        return view('carts.index', compact('cartItems'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CartRequest  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function store(CartRequest $request, Product $product)
    {
        ShoppingCart::fromSession()->add($product);

        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CartRequest  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(CartRequest $request, Product $product)
    {
        ShoppingCart::fromSession()->update($product, $request->quantity);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        ShoppingCart::fromSession()->remove($product->id);

        return back();
    }

    /**
     * Remove all items from the cart.
     *
     * @return \Illuminate\Http\Response
     */
    public function empty()
    {
        ShoppingCart::fromSession()->destroy();

        return redirect()->route('carts.index');
    }
}
