<x-app>
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('dashboard.index') }}">Dashboard</a> / New Orders
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
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Completed</th>
                            <th>Customer</th>
                            <th>Total Price</th>
                            <th>Created at</th>
                            <th>View Full Order</th>
                            <th>Mark as Completed</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->completed === 0 ? 'No' : 'Yes' }}</td>
                            <td>{{ $order->customer->name }}</td>
                            <td>{{ $order->price }}€</td>
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
            </div>
        </div>
    </div>
    </div>
</x-app>
