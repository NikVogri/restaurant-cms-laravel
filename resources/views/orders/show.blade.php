<x-app>
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('dashboard.index') }}">Dashboard</a> / <a href="{{ route('orders.index') }}"> All
                orders</a> / View Order
        </li>
    </ol>
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Items in Order
        </div>
        <div class="card-body">
            <div class="table-responsive ">
                @if(!$order->completed)
                <form action="{{ route('orders.complete', $order->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button class="btn btn-success mb-3">Complete order</button>
                </form>
                @else
                <div class="card m-0 mb-2 d-inline-block border-success">
                    <div class="card-body p-2">
                        <h5 class="m-0 text-success">Order completed {{ $order->updated_at->diffForHumans() }}</h5>
                    </div>
                </div>
                @endif
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Item Name</th>
                            <th>Item Price</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->orderItems as $orderItems)
                        <tr>
                            <td>{{ $orderItems->item->name }}</td>
                            <td>{{ $orderItems->item->price }}€</td>
                            <td>{{ $orderItems->quantity }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="card d-inline-block mt-2 p-0 text-center p-2">
                    <div class="card-body">
                        <h5 class="m-0">Total price: {{ $price }} €</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app>
