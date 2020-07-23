<x-app>
    <h4 class="mt-3 mb-4">Your messages ({{ auth()->user()->messages->count() }})</h4>
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('dashboard.index') }}">Dashboard</a> / Messages
        </li>
    </ol>
    <a href="{{ route('messages.create') }}" class="btn btn-success mb-3">Create new
        message</a>
    <ul class="list-group d-block">
        @foreach (auth()->user()->messages as $userMessage)
        <a href="{{ route('messages.show', $userMessage->message->id ) }}">
            <li class="list-group-item mb-1">{{ $userMessage->message->title }}</li>
        </a>
        @endforeach
    </ul>
</x-app>
