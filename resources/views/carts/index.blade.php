@extends('layouts.app')

@section('title', 'Shopping Cart')

@section('content')

    <h1 class="flex justify-between mb-2">
        <span class="text-2xl font-light">View Cart</span>

        @if (\App\Services\Utilities\ShoppingCart::fromSession()->isNotEmpty())
            <span class="flex items-center">
                @include('carts.partials.forms._destroy_cart')

                <a href="#" class="btn btn-info text-white ml-1">Checkout</a>
            </span>
        @endif
    </h1>

    @if (\App\Services\Utilities\ShoppingCart::fromSession()->isNotEmpty())
        <table class="table bg-white">
            <thead>
                <th width="45%">Item</th>
                <th class="text-center" width="15%">Price</th>
                <th class="text-center" width="20%">Qty</th>
                <th class="text-center" width="10%">Subtotal</th>
                <th class="text-right" width="10%"></th>
            </thead>
            <tbody>
                @foreach ($cartItems as $productId => $item)
                    @include('carts.partials.tables._row_item', [
                        'productId' => $productId,
                        'item' => $item,
                    ])
                @endforeach
            </tbody>
        </table>
    @else
        The shopping cart is empty.
    @endif

@endsection