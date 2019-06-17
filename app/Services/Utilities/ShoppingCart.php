<?php

namespace App\Services\Utilities;

use App\Facades\Price;
use Illuminate\Support\Collection;
use App\Services\Utilities\CartItem;

class ShoppingCart extends Collection
{
    /**
     * Get a shopping cart stored in a session.
     *
     * @return Illuminate\Support\Collection
     */
    public static function fromSession()
    {
        return session('cart', new self);
    }

    /**
     * Add a product with a quantity to the cart.
     *
     * @param \App\Product  $product
     * @param integer $quantity
     * @return void
     */
    public function add($product, $quantity = 1)
    {
        $totalQuantity = $this->getTotalQuantity($product, $quantity);

        $this->put($product->id, CartItem::fromProductAndQuantity($product, $totalQuantity));

        $this->save();
    }

    /**
     * Update a cart item's quantity.
     *
     * @param  \App\Product $product
     * @param  integer $quantity
     * @return void
     */
    public function update($product, $quantity)
    {
        $this->put($product->id, CartItem::fromProductAndQuantity($product, $quantity));

        $this->save();
    }

    /**
     * Remove an item from the cart.
     *
     * @param  integer $productId
     * @return void
     */
    public function remove($productId)
    {
        $this->forget($productId);

        $this->save();
    }

    /**
     * Remove all products from the cart.
     *
     * @return void
     */
    public function destroy()
    {
        session()->forget('cart');
    }

    /**
     * Add a customer's address to the cart.
     *
     * @param  \Illuminate\Support\Collection $address
     * @return void
     */
    public function complete($address)
    {
        $this->put('address', $address);

        $this->save();
    }

    /**
     * Present the cart's subtotal in dollars and the currency.
     *
     * @return string
     */
    public function presentSubtotal()
    {
        return Price::present($this->getSubtotalInCents());
    }

    /**
     * Present the cart's tax amount in dollars and the currency.
     *
     * @return string
     */
    public function presentTaxAmount()
    {
        return Price::present($this->getTaxAmountInCents());
    }

    /**
     * Present the cart's shipping costs in dollars and the currency.
     *
     * @return string
     */
    public function presentShippingCosts()
    {
        return Price::present($this->getShippingCostsInCents());
    }

    /**
     * Present the cart's total in dollars and the currency.
     *
     * @return string
     */
    public function presentTotal()
    {
        return Price::present($this->getTotalInCents());
    }

    public function presentCartTax()
    {
        return (config('cart.tax') * 100).'%';
    }

    public function getTotalInDollars()
    {
        return Price::toDollars($this->getTotalInCents());
    }

    /**
     * Determine if there is any item in the cart.
     *
     * @return boolean
     */
    public function isEmpty()
    {
        return $this->sum('quantity') == 0;
    }

    /**
     * Calculate the cart's total in cents.
     *
     * @return integer
     */
    public function getTotalInCents()
    {
        return collect([
            $this->getSubtotalInCents(),
            $this->getTaxAmountInCents(),
            $this->getShippingCostsInCents(),
        ])->sum();
    }

    /**
     * Calculate the cart's shipping costs in cents.
     *
     * @return integer
     */
    private function getShippingCostsInCents()
    {
        return $this->getSubtotalInCents() * 0.1;
    }

    /**
     * Calculate the cart's tax amount in cents.
     *
     * @return integer
     */
    private function getTaxAmountInCents()
    {
        return $this->getSubtotalInCents() * config('cart.tax');
    }

    /**
     * Calculate the cart's subtotal in cents.
     *
     * @return integer
     */
    private function getSubtotalInCents()
    {
        return $this->sum('subtotal');
    }

    /**
     * Update the cart's content;
     *
     * @return \Illuminate\Support\Collection
     */
    private function save()
    {
        return session()->put('cart', $this);
    }

    /**
     * Calculate the cart item's total quantity.
     *
     * @param  \App\Product $product
     * @param  integer $quantity
     * @return integer
     */
    private function getTotalQuantity($product, $quantity)
    {
        return $quantity + $this->getInCartQuantity($product);
    }

    /**
     * Get the cart item's quantity already in cart.
     *
     * @param  \App\Product $product
     * @return integer
     */
    private function getInCartQuantity($product)
    {
        return optional($this->get($product->id))->quantity ?? 0;
    }
}