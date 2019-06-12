<?php

namespace App\Http\Controllers\Cart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Utilities\ShoppingCart;
use App\Http\Requests\CartAddressRequest;

class CartAddressController extends Controller
{
    public function store(CartAddressRequest $request)
    {
        $address = $request->check_delivery == 'on'

            ?  $request->all() : $request->billing;

        return $address;

        ShoppingCart::fromSession()->complete($address);

        return back();
    }
}
