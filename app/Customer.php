<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'street_address', 'postal_code', 'city',
        'country', 'phone', 'email', 'stripe_id'
    ];

    /**
     * Create a new customer.
     *
     * @param  array $data
     * @param  array $stripe_customer
     * @return \App\Customer
     */
    public static function createFrom(array $data, $stripe_customer)
    {
        $billing_address = collect($data)
            ->put('stripe_id', $stripe_customer->id)
            ->toArray();

        return static::create($billing_address);
    }
}
