<x-app>
    <h4 class="mt-3 mb-4">Completed alerts ({{ $alerts->count() }})</h4>
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('dashboard.index') }}">Dashboard</a> / <a href="{{ route('alerts.index') }}">Alerts</a> /
            Completed Alerts
        </li>
    </ol>
    <ul class="list-group d-block">
        @forelse ($alerts as $alert)
        @if ($alert->alert_type === 'order')
        <li class="list-group-item mb-1">
            <span class="text-success">[Completed]</span>
            An order has been placed
            <a href="{{ route('orders.show', $alert->order) }}">View order</a>
        </li>
        @endif
        @empty
        <h5 class="text-center text-secondary mt-5">No Alerts Yet</h5>
        @endforelse
    </ul>
</x-app>
