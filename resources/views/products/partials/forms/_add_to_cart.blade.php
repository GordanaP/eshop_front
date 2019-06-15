<form action="{{ route('carts.store', $product) }}" method="POST">

    @csrf
    @method('PATCH')

    <div class="flex w-3/4">
        <div class="form-group mr-2">
            <input type="text" class="form-control text-center @error('quantity') is-invalid @enderror"
            name="quantity" id="quantity" value="1">

            @error('quantity')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <button type="submit" class="btn bg-gray-700 text-white">
                Add to Cart
            </button>
        </div>
    </div>

</form>