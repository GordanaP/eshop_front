<tr>
    <td width="45%">
        <div class="flex">
            <div>
               <svg class="bd-placeholder-img" width="50%" height="60%" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".1em">Image</text></svg>
            </div>
            <div>
                <p class="uppercase mb-2">{{ collect($item)->get('product')->name }}</p>
                <p class="text-xs">{{ collect($item)->get('product')->description }}</p>
            </div>
        </div>
    </td>
    <td class="text-center" width="15%">
        {{ collect($item)->get('product')->price_in_dollars }}
    </td>
    <td width="20%">
        @include('carts.partials.forms._update_quantity',
            ['productId' => $productId]
        )
    </td>
    <td class="text-center" width="10%">
        Subtotal
    </td>
    <td class="text-right" width="10%">
        @include('carts.partials.forms._remove_item',
            ['productId' => $productId]
        )
    </td>
</tr>