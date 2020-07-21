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
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Item Id</th>
                            <th>Item Price</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->items as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->item->name }}</td>
                            <td>{{ $item->item->price }}€</td>
                            <td>{{ $item->quantity }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="card d-inline-block mt-2 p-0">
                    <div class="card-body">
                        <h5 class="m-0">Total price: {{ $order->price }}€</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app>
