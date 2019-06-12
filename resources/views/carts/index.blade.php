@extends('layouts.app')

@section('title', 'Shopping Cart')

@section('content')

    <header class="flex justify-between mb-2">
        <span class="text-2xl font-light">View Cart</span>

        @if (\App\Services\Utilities\ShoppingCart::fromSession()->isNotEmpty())
            <span class="flex items-center">
                @include('carts.partials.forms._destroy_cart')

                <a href="{{ route('orders.create') }}" class="btn btn-info text-white ml-1">
                    Checkout
                </a>
            </span>
        @endif
    </header>

    @if (\App\Services\Utilities\ShoppingCart::fromSession()->isNotEmpty())
        <table class="table bg-white">
            <thead>
                <th width="12%">Item</th>
                <th width="25%"></th>
                <th class="text-center" width="20%">Price</th>
                <th class="text-center" width="15%">Qty</th>
                <th class="text-right" width="15%">Subtotal</th>
                <th class="text-right"></th>
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