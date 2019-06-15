@extends('layouts.app')

@section('title', $product->name)

@section('content')
    <div class="flex">
        <div class="w-1/2">
            <img src="https://picsum.photos/200" alt="" class="mx-auto w-3/5 rounded-sm">
        </div>

        <div class="w-2/5">
            <p class="text-2xl font-bold uppercase">{{ $product->name }}</p>

            <p>{{ Price::present($product->price_in_cents) }}</p>

            <p class="mt-3">{{ $product->description }}</p>

            <p class="mt-8">
                @include('products.partials.forms._add_to_cart')
            </p>
        </div>
    </div>
@endsection