<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stripe extends Model
{
    public function charge($token, $amount)
    {
        \Stripe\Stripe::setApiKey("sk_test_4eC39HqLyjWDarjtT1zdp7dc");

        \Stripe\Charge::create([
          "amount" => $amount,
          "currency" => "usd",
          "source" => $token, // obtained with Stripe.js
          // "description" => "Charge for jenny.rosen@example.com"
        ]);
    }
}
