<form action="{{ route('carts.store', $product) }}" method="POST">

    @csrf

    <button type="submit" class="btn btn-sm btn-warning">
        Add To Cart
    </button>

</form>