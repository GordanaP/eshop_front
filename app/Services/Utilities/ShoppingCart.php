<?php

namespace App\Services\Utilities;

use Illuminate\Support\Collection;
use App\Services\Utilities\CartItem;

class ShoppingCart extends Collection
{
    public static function fromSession()
    {
        return session('cart', new self);
    }

    public function add($product, $quantity = 1)
    {
        $totalQuantity = $this->totalQuantity($product, $quantity);

        $this->put($product->id, new CartItem ($product, $totalQuantity));

        $this->save();
    }

    private function save()
    {
        return session()->put('cart', $this);
    }

    private function totalQuantity($product, $quantity)
    {
        return $quantity + $this->inCartQuantity($product);
    }

    private function inCartQuantity($product)
    {
        return optional($this->get($product->id))->quantity ?? 0;
    }
}