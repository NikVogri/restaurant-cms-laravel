<a href="{{ $alert->order->path() }}"> <i class="fas fa-utensils"></i> A new order has been received <small
        class="text-muted">[{{ $alert->created_at->diffForHumans() }}]</small></a>

<form action="{{ route('alerts.complete', $alert->id) }}" method="POST" class="float-right">
    @csrf
    @method('PATCH')
    <button class="btn btn-primary btn-sm">Complete Order</button>
</form>
