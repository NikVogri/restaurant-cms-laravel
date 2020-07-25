<x-master>
    <div class="card mb-3 container mt-5">
        <div class="card-body">
            @if($cartItems->count() > 0)
            <div class="table-responsive">
                <table class="table table-bordered" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Item name</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cartItems as $cartItem)
                        <tr>
                            <td>{{ $cartItem->item->name}}</td>
                            <td>{{ $cartItem->item->price}}€</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <p class="font-weight-bold">Total Price: {{ $totalPrice }} €</p>


                <a href="{{ route('orders.create-new-order') }}" class="btn btn-primary">
                    Order Now</a>
                <a href="/">Back</a>

            </div>
            @else
            <h5>No items yet!</h5>
            <a href="/">Back</a>
            @endif
        </div>
    </div>
    </div>
</x-master>
