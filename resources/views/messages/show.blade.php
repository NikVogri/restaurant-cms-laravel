<x-app>

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('dashboard.index') }}">Dashboard</a> / <a
                href="{{ route('messages.index') }}">Messages</a> / {{ $message->id }}
        </li>
    </ol>
    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="mb-3">{{ $message->title }} - {{ $message->created_at->diffForHumans() }}</h5>
            <p>{{ $message->body }}</p>
            <form action="{{ route('messages.update', $message->id) }}" method="POST">
                @csrf
                @method('PUT')
                <button class="btn btn-primary mt-3" type="submit">Mark as read</button>
            </form>
        </div>
    </div>
    </div>

</x-app>
