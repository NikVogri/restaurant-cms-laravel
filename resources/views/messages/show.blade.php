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
        </div>
    </div>
    </div>
</x-app>
