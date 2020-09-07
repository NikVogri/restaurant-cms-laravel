<x-app>
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('dashboard.index') }}">Dashboard</a> / All orders
        </li>
    </ol>
    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            All Orders
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Completed</th>
                            <th>Customer</th>
                            <th>Payment Type</th>
                            <th>Total Price</th>
                            <th>Created at</th>
                            <th>Order Details</th>
                            <th>Mark as Completed</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr style="{{$order->completed == 0 ? 'background-color: rgba(255, 129, 129, 0.15);"' : '' }}">
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->completed === 0 ? 'No' : 'Yes' }}</td>
                            <td>{{ $order->customer->name }}</td>
                            <td>{{ $order->paymentType->name }}</td>
                            <td>{{ $order->total_price }}€</td>
                            <td>{{ $order->created_at->diffForHumans() }}</td>
                            <td><a href="{{ route('orders.show', $order->id) }}">View</a></td>
                            @if($order->completed === 0)
                            <td>
                                <form action="{{ route('orders.complete', $order->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-success" type="submit">Complete</button>
                                </form>
                            </td>
                            @else
                            <td>
                                <form action="{{ route('orders.undo-complete', $order->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-success" type="submit">Undo Complete</button>
                                </form>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $orders->links() }}
            </div>
        </div>
    </div>
    </div>
</x-app>
