<tr>
    <td>
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".1em">Image</text></svg>
    </td>
    <td>
        <p class="uppercase mb-2">
            <a href="{{ route('products.show', $productId) }}">
                {{ collect($item)->get('product')->name }}
            </a>
        </p>
        <p class="text-xs">{{ collect($item)->get('product')->description }}</p>
    </td>
    <td class="text-center">
        {{ collect($item)->get('product')->price_in_dollars }}
    </td>
    <td class="text-center">
        @if (request()->route()->named('carts.index'))
            @include('carts.partials.forms._update_quantity',
                ['productId' => $productId]
            )
        @else
            {{ $item->quantity }}
        @endif
    </td>
    <td class="text-right">
        Subtotal
    </td>
    @if (request()->route()->named('carts.index'))
        <td class="text-right">
            @include('carts.partials.forms._remove_item',
                ['productId' => $productId]
            )
        </td>
    @endif
</tr>