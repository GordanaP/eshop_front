<form action="{{ route('carts.empty') }}" method="POST">

    @csrf
    @method('DELETE')

    <button type="submit" class="btn btn-danger pull-right">
        @if (request()->route()->named('orders.create'))
            Cancel Order
        @else
            <i class="fa fa-trash"></i> Empty cart
        @endif
    </button>

</form>