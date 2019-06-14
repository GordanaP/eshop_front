<?php

namespace App\Services\Utilities;

class Price
{
    /**
     * Format number to float.
     *
     * @param  integer  $number
     * @param  integer $decimals
     * @return float
     */
    public function getFormatted($number, $decimals = 2)
    {
        return number_format($number, $decimals);
    }

    public function toCents($priceInDollars)
    {
        return $priceInDollars * 100;
    }

    public function toDollars($priceInCents)
    {
        return static::getFormatted($priceInCents/100);
    }

    public function present($priceInCents)
    {
        return config('cart.currency') . self::toDollars($priceInCents);
    }
}