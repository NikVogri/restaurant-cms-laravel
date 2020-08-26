<x-app>
    <h4 class="mt-3 mb-4">All alerts ({{ $alerts->count() }})</h4>
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('dashboard.index') }}">Dashboard</a> / Alerts
        </li>
    </ol>
    @include('alerts._list')
</x-app>
