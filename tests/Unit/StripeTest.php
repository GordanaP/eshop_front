<?php

namespace Tests\Unit;

use App\Stripe;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StripeTest extends TestCase
{
    const LAST4 = [
        'tok_visa' => '4242'
    ];

    /**
     * @test
     */
    public function it_works()
    {
        $stripe = app(Stripe::class);

        $last4 = $stripe->charge('tok_visa', 10 * 100);

        $this->assertEquals(LAST4['tok_visa'], $last4);
    }
}
