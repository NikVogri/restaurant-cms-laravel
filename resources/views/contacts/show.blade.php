<x-app>

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('dashboard.index') }}">Dashboard</a> / <a
                href="{{ route('contacts.index') }}">Contacts</a> / {{ $contact->id }}
        </li>
    </ol>
    <!-- DataTables Example -->
    <div class="card">
        <div class="card-body">
            <span class="text-small ">
                {{ $contact->created_at->diffForHumans() }} from {{ $contact->name }} - {{ $contact->email }}
            </span>
            <hr>
            <p class="m-0 py-3">{{ $contact->body }}</p>
            @if(!$contact->read)
            <form action="{{ route('contacts.update', $contact->id) }}" method="post">
                @csrf
                @method('PUT')
                <button class="btn btn-warning btn-sm " type="submit">Mark as Read</button>
            </form>
            @endif
        </div>
    </div>
    </div>
</x-app>
