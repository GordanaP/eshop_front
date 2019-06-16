@extends('layouts.app')

@section('title', 'Pay for the order')


@section('content')

    <p class="text-2xl font-light">Payment details</p>

    <hr>

    <div class="card card-body w-1/2 mx-auto">

        <form id="checkoutForm" action="{{ route('purchases.store') }}" method="POST">

            @csrf

            <input type="hidden" name="stripeToken" id="stripeToken">
            <input type="hidden" name="stripeEmail" id="stripeEmail">

            {{-- <script
                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                data-key="{{ config('services.stripe.key') }}"
                data-amount="{{ ShoppingCart::fromSession()->getTotalInCents() }}"
                data-name="Eshop Front"
                data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                data-locale="auto">
          </script> --}}

            <button class="btn btn-info text-white" type="button" id="payWithStripe">
                Pay with Stripe
            </button>

        </form>

    </div>
@endsection

@section('scripts')

            <script src="https://checkout.stripe.com/checkout.js"></script>

            <script>

                var stripe = StripeCheckout.configure({
                    key: "{{ config('services.stripe.key') }}",
                    image: 'https://stripe.com/img/documentation/checkout/marketplace.png',
                    locale: 'auto',
                    token: function(token) {
                        document.querySelector('#stripeEmail').value = token.email;
                        document.querySelector('#stripeToken').value = token.id;

                        $('#checkoutForm').submit()
                    }
                });

                $(document).on('click', '#payWithStripe', function(){
                    stripe.open({
                        name: "{{ config('app.name') }}",
                        // description: '2 widgets',
                        amount: "{{ ShoppingCart::fromSession()->getTotalInCents() }}",
                    });
                });
            </script>

@endsection

