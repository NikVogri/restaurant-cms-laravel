<table class="table table-bordered" cellspacing="0">
    <tbody>
        @foreach ($cart->items as $cartItem)
        <tr>
            <td>{{ $cartItem->item->name}}</td>
            <td class="d-flex">
                <form action="{{ route('cart.update', $cartItem->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <input type="hidden" name="count" value="decrement">
                    <button type="submit" class="btn btn-outline-secondary btn-sm py-1 px-3">-</button>
                </form>
                <p class="px-3">{{ $cartItem->quantity}}</p>
                <form action="{{ route('cart.update', $cartItem->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <input type="hidden" name="count" value="increment">
                    <button type="submit" class="btn btn-outline-secondary btn-sm py-1 px-3">+</button>
                </form>
            </td>
            <td>{{ $cartItem->item->price * $cartItem->quantity}}€</td>
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
