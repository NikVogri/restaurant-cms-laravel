<ul class="list-group d-block">
    @forelse ($alerts as $alert)
    <li class="list-group-item mb-1">


        @if($alert->alertable_type === 'App\Order')
        @include('alerts.types.orderAlert')
        @endif

        @if($alert->alertable_type === 'App\Contact')
        @include('alerts.types.contactAlert')
        @endif

    </li>

    @empty
    <h5 class="text-center text-secondary mt-5">No Alerts Yet</h5>
    @endforelse
</ul>
