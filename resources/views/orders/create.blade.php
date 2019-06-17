@extends('layouts.app')

@section('title', 'Order Details')

@section('content')
    <header class="flex justify-between mb-2">
        <span class="text-2xl font-light">Order Details</span>

        <div class="flex items-center">
            <a href="{{ route('products.index') }}" class="mr-4">
                Continue shopping
            </a>

            @if (! ShoppingCart::fromSession()->isEmpty())
                <a href="{{ route('carts.index') }}" class="btn btn-info text-white">
                    <i class="fa fa-shopping-cart fa-lg mr-1" aria-hidden="true"></i>
                    <span>Update cart</span>
                </a>
            @endif
        </div>
    </header>

    <hr>

    @include('partials._alerts')

    <form action="{{ route('purchases.store') }}" method="POST">

        @csrf

        <div class="flex">
            <div class="w-1/3">
                <div class="flex">
                    <p class="mb-2 mr-4 font-bold">Billing Address</p>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="check_delivery" id="check_delivery">
                        <label class="form-check-label" for="check_delivery">
                            Different delivery address
                        </label>
                    </div>
                </div>

                @include('carts.partials.forms._add_address', [
                    'address' => 'billing'
                ])

                <div id="shipping_address" style="display: none">
                    <p class="mb-2 mt-4 font-bold">Shipping Address</p>

                    @include('carts.partials.forms._add_address', [
                        'address' => 'shipping'
                    ])
                </div>
            </div>

            <div class="w-2/3">
                <div class="w-4/5 float-right">
                    <p class="mb-2 font-bold flex items-center justify-between">
                        Your order
                        {{-- @include('carts.partials.forms._destroy_cart') --}}
                    </p>

                    <table class="table bg-white text-xs">
                        <tbody>
                            @foreach ($cartItems as $productId => $item)

                                @include('carts.partials.tables._row_item')

                            @endforeach

                            @include('carts.partials.tables._row_price')

                        </tbody>
                    </table>

                    <div class="float-right">
                        <script
                            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                            data-key="{{ config('services.stripe.key') }}"
                            data-amount="{{ Price::toCents(ShoppingCart::fromSession()->getTotalInDollars()) }}"
                            data-currency="{{ config('services.stripe.currency') }}"

                            data-name="Eshop Front"
                            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                            data-locale="auto">
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('scripts')
    <script>

        $(document).on('click', '#check_delivery', function(){

            $('#shipping_address').toggle();

        });

    </script>
@endsection