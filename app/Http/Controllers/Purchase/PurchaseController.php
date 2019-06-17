<?php

namespace App\Http\Controllers\Purchase;

use App\Customer;
use App\Shipping;
use App\Facades\Price;
use Illuminate\Http\Request;
use App\Facades\ShoppingCart;
use App\Http\Controllers\Controller;
use App\Http\Requests\CartAddressRequest;
use Stripe\{Stripe, Charge, Customer as StripeCustomer};

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('payments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            Stripe::setApiKey(config('services.stripe.secret'));

            $stripeCustomer = StripeCustomer::create([
                  'email' => $request->stripeEmail,
                  'source'  => $request->stripeToken,
            ]);

            $charge = \Stripe\Charge::create([
                'customer' => $stripeCustomer->id,
                'amount'   => Price::toCents(ShoppingCart::fromSession()->getTotalInDollars()),
                'currency' => config('services.stripe.currency'),
            ]);

            $request->check_delivery == 'on' ?  $shipping = Shipping::create($request->shipping) : '' ;

            $customer = Customer::createFrom($request->billing, $stripeCustomer);

            $customer->shippings()->save($shipping);

            ShoppingCart::fromSession()->destroy();

        } catch (\Exception $e) {
            return back()->with('danger', $e->getMessage());
        }

        return 'All done';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
