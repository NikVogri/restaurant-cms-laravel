<table class="table table-bordered" cellspacing="0">
    <tbody>
        @foreach ($cart->items as $cartItem)
        <tr>
            <td>{{ $cartItem->item->name}}</td>
            <td>{{ $cartItem->item->price}}€</td>
            <td>{{ $cartItem->quantity}}</td>
            <td class="text-center" width="100">

                <form action="{{ route('cart.destroy', $cartItem->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button title="Remove Item" class="btn btn-primary">Remove</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
