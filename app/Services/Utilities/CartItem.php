<?php

namespace App\Services\Utilities;

class CartItem
{
    /**
     * Create a cart item from a product and a quantity.
     *
     * @param  \App\Product $product
     * @param  integer $quantity
     * @return \Illuminate\Support\Collection
     */
    public static function fromProductAndQuantity($product, $quantity)
    {
        $product->quantity = $quantity;

        $product->subtotal = $product->price_in_cents * $product->quantity;

        return $product;
    }
}