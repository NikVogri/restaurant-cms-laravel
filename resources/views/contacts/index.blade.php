<x-app>

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('dashboard.index') }}">Dashboard</a> / Contacts
        </li>
    </ol>

    <ul class="list-group d-block">
        @forelse ($contacts as $contact)

        <li class="list-group-item mb-1 {{ $contact->read ? 'bg-light' : '' }}">

            <span>{{ $contact->name }} </span>
            <a class="ml-5"
                href="{{ route('contacts.show', $contact->id ) }}">{{ strlen($contact->body) > 99 ? substr($contact->body, 0, 100).'...' : $contact->body  }}{{ $contact->read ? ' [read]' : '' }}</a>
            <span class="float-right mr-3">{{ $contact->created_at->diffForHumans() }}</span>
        </li>

        @empty
        <h5 class="text-secondary">No contact messages yet</h5>
        @endforelse

    </ul>

</x-app>
