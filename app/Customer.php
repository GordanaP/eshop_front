<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'street_address', 'postal_code', 'city',
        'country', 'phone', 'email', 'stripe_id'
    ];

    public function shippings()
    {
        return $this->hasMany(Shipping::class);
    }

    /**
     * Create a new customer.
     *
     * @param  array $data
     * @param  array $stripe_customer
     * @return \App\Customer
     */
    public static function createFrom(array $data, $stripeCustomer)
    {
        $billingAddress = collect($data)
            ->put('stripe_id', $stripeCustomer->id)
            ->toArray();

        return static::create($billingAddress);
    }
}
