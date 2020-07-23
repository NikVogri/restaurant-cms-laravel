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
        @if ($alert->alert_type === 'order')
        <li class="list-group-item mb-1">
            @if($alert->completed)
            <span class="text-success">[Completed]</span>
            @else
            <span class="text-primary">[Active]</span>
            @endif
            An order has been placed

            <a href="{{ route('orders.show', $alert->order) }}">View order</a>

            @if(!$alert->completed)
            <form action="{{ route('alerts.update', $alert->id) }}" method="POST" class="float-right">
                @csrf
                @method('PUT')
                <button class="btn btn-primary btn-sm">Complete
                    order</button>
            </form>
            @endif
        </li>
        @endif
        @empty
        <h5 class="text-center text-secondary mt-5">No Alerts Yet</h5>
        @endforelse
    </ul>
</x-app>
