<x-master>
    <div class="card mb-3 container mt-5">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Item name</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($cartItems as $cartItem)
                        <tr>
                            <td>{{ $cartItem->item->name}}</td>
                            <td>{{ $cartItem->item->price}}€</td>
                        </tr>
                        @empty
                        <h5>No items yet!</h5>
                        @endforelse
                    </tbody>
                </table>
                <p class="font-weight-bold">Total Price: {{ $totalPrice }} €</p>
                <a href="{{ route('orders.create-new-order') }}" class="btn btn-primary">
                    Order Now</a>
            </div>
        </div>
    </div>
    </div>
</x-master>
