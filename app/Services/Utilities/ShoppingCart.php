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

    public function add($product_id, $quantity = 1)
    {
        $totalQuantity = $this->totalQuantity($product_id, $quantity);

        $this->put($product_id, new CartItem ($product_id, $totalQuantity));

        $this->save();
    }

    private function save()
    {
        return session()->put('cart', $this);
    }

    private function totalQuantity($product_id, $quantity)
    {
        return $quantity + $this->inCartQuantity($product_id);
    }

    private function inCartQuantity($product_id)
    {
        return optional($this->get($product_id))->quantity ?? 0;
    }
}