<div class="col-md-4">
    <div class="card mb-4 shadow-sm">
        <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

        <div class="card-body">
            <p class="lead mb-1 uppercase">{{ $product->name }}</p>

            <p class="mb-2 text-lg font-bold">{{ Price::present($product->price_in_cents) }}</p>

            <p class="text-sm mb-4">{{ $product->description }}</p>

            <div class="flex justify-between items-center">
                <a href="{{ route('products.show', $product) }}">
                    View
                </a>

                @include('carts.partials.forms._add_item',
                    ['product' => $product]
                )
            </div>
        </div>
    </div>
</div>