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


            @if($alert->alert_type === 'order')
            A new order has been received <small class="text-muted">[{{ $alert->created_at->diffForHumans() }}]</small>
            @endif

            @if($alert->alert_type === 'contact')
            A new contact form submission has been received <small
                class="text-muted">[{{ $alert->created_at->diffForHumans() }}]</small>
            @endif

            <form action="{{ route('alerts.destroy', $alert->id) }}" method="POST" class="float-right">
                @csrf
                @method('DELETE')
                <button class="btn btn-primary btn-sm">Complete</button>
            </form>
        </li>

        @empty
        <h5 class="text-center text-secondary mt-5">No Alerts Yet</h5>
        @endforelse
    </ul>
</x-app>
