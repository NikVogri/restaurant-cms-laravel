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

                <h4 class="m-0 mb-2">Total price: {{ $price }} €</h4>
                <hr>

            </div>

            <h5 class="my-2">Delivery details</h5>
            <p>{{ $order->customer->address->street_name}} {{ $order->customer->address->street_num}}</p>
            <p>{{ $order->customer->address->city}}</p>
            <p>{{ $order->customer->address->post_code}}</p>
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
        </div>
    </div>
    </div>

    </div>
</x-app>
