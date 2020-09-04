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
                            <th>Quantity</th>
                            <th>Item Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->orderItems as $orderItem)
                        @if(!is_null($orderItem->item_id))
                        <tr>
                            <td>{{ $orderItem->item->name }}</td>
                            <td>{{ $orderItem->quantity }}</td>
                            <td>{{ $orderItem->item->price * $orderItem->quantity }}€</td>
                        </tr>
                        @else
                        <tr>
                            <td>Item deleted</td>
                            <td>0</td>
                            <td>0€</td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>

                <h4 class="m-0 mb-2">Total price: {{ $order->total_price }} €</h4>
                @if($order->coupon)
                <h5>Coupon Applied: {{ $order->coupon->coupon }}</h5>
                @endif
                <hr>

            </div>

            <h5 class="my-2">Delivery details</h5>
            <p>{{ $order->customer->name }}</p>
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
