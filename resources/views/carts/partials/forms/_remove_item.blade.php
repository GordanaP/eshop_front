<form action="{{ route('carts.destroy', $productId) }}" method="POST">

    @csrf
    @method('DELETE')

    <button type="submit" class="btn">
        <i class="fa fa-lg fa-trash"></i>
    </button>

</form>