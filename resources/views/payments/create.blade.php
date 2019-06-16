@extends('layouts.app')

@section('title', 'Pay for the order')


@section('content')
    {{-- {{ Session::flush() }} --}}
    {{ ShoppingCart::fromSession()->presentTotal() }}

    <p class="text-2xl font-light">Payment details</p>

    <hr>

    <div class="card card-body w-1/2 mx-auto">

        <form action="{{ route('purchases.store') }}" method="POST">

            @csrf

            <script
                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                data-key="{{ config('services.stripe.key') }}"
                data-amount="{{ ShoppingCart::fromSession()->getTotalInCents() }}"
                data-name="Eshop Front"
                data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                data-locale="auto">
          </script>

        </form>

    </div>
@endsection

