<?php

namespace App\Http\Controllers\Cart;

use Illuminate\Http\Request;
use App\Facades\ShoppingCart;
use App\Http\Controllers\Controller;
use App\Http\Requests\CartAddressRequest;

class CartAddressController extends Controller
{
    public function store(CartAddressRequest $request)
    {
        $address = $request->check_delivery == 'on'

            ?  $request->all() : $request->billing;

        ShoppingCart::fromSession()->complete($address);

        return back();
    }
}
