<?php

namespace App\Http\Controllers\Cart;

use App\Product;
// use Illuminate\Http\Request;
use App\Http\Requests\CartRequest;
use App\Http\Controllers\Controller;
use App\Services\Utilities\ShoppingCart;

class CartItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartItems = ShoppingCart::fromSession();

        return view('carts.index', compact('cartItems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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