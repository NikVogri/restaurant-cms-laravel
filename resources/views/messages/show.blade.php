<x-app>

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('dashboard.index') }}">Dashboard</a> / <a
                href="{{ route('messages.index') }}">Messages</a> / {{ $message->id }}
        </li>
    </ol>
    <!-- DataTables Example -->
    <div class="card">
        <div class="card-body">
            <h5 class="d-inline">{{ $message->title }} </h5>
            <span class="text-small text-secondary font-italic">
                - {{ $message->created_at->diffForHumans() }} from {{ $message->author->name }}
            </span>
            <hr>
            <p class="m-0 py-3">{{ $message->body }}</p>
            @if(!$message->pivot->read)
            <form action="{{ route('messages.update', $message->id) }}" method="post">
                @csrf
                @method('PUT')
                <button class="btn btn-warning btn-sm " type="submit">Mark as Read</button>
            </form>
            @endif
        </div>
    </div>
    </div>
</x-app>
