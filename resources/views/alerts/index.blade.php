<x-app>
    <h4 class="mt-3 mb-4">All alerts ({{ $alerts->count() }})</h4>
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('dashboard.index') }}">Dashboard</a> / Alerts
        </li>
    </ol>
    <ul class="list-group d-block">
        @forelse ($alerts as $alert)
        <li class="list-group-item mb-1">
            @if($alert->order->completed)
            <span class="text-success mr-5">[Completed]</span>
            @else
            <span class="text-primary mr-5">[Active]</span>
            @endif
            An order has been placed

            <a href="{{ route('orders.show', $alert->order->id) }}">View order</a>

            @if(!$alert->order->completed)
            <form action="{{ route('orders.complete', $alert->order->id) }}" method="POST" class="float-right">
                @csrf
                @method('PUT')
                <button class="btn btn-primary btn-sm">Complete
                    order</button>
            </form>
        </li>
        @endif
        @empty
        <h5 class="text-center text-secondary mt-5">No Alerts Yet</h5>
        @endforelse
    </ul>
</x-app>
