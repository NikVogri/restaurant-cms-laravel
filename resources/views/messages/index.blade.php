<x-app>
    <h4 class="mt-3 mb-4">Your messages ({{ $messages->count() }})
    </h4>
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('dashboard.index') }}">Dashboard</a> / Messages
        </li>
    </ol>
    <a href="{{ route('messages.create') }}" class="btn btn-success mb-3">Create new
        message</a>
    <ul class="list-group d-block">
        @forelse ($messages as $message)

        <li class="list-group-item mb-1 {{ $message->read ? 'bg-light' : '' }}">

            <span>{{ $message->author->name }} </span>
            <a class="ml-5" href="{{ route('messages.show', $message->id ) }}">{{ $message->title }}</a>
            <span class="float-right mr-3">{{ $message->created_at->diffForHumans() }}</span>
            @if($message->read)
            <small>[Read]</small>
            @endif
        </li>

        @empty
        <h5 class="text-secondary">No messages yet</h5>
        @endforelse

    </ul>
</x-app>
