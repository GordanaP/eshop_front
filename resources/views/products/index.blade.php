@extends('layouts.app')

@section('title', 'All Products')

@section('content')
    <div class="album py-5 bg-light">
        <div class="container">
            @include('partials._jumbotron')

            @foreach ($products->chunk(3) as $chunk)
                <div class="row">
                    @foreach ($chunk as $product)
                        @include('products.partials.html._product',
                            ['product' => $product]
                        )
                    @endforeach
                </div>
            @endforeach
        </div>/
    </div>
@endsection