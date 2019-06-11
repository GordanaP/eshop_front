<form action="{{ route('carts.update', $productId) }}" method="POST">

    @csrf
    @method('PATCH')

    <div class="flex w-1/2 mx-auto">
        <input type="text" name="quantity" id="quantity" class="form-control text-center"
        value="{{ $item->quantity }}">

        <button type="submit" class="btn">
            <i class="fa fa-refresh"></i>
        </button>
    </div>

</form>