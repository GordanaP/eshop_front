<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'street_address', 'postal_code', 'city',
        'country', 'phone'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
