<a href="{{ route('contacts.show', $alert->contact->id) }}"> <i class="fas fa-file-signature"></i> A new contact form
    submission has been
    received <small class="text-muted">[{{ $alert->created_at->diffForHumans() }}]</small>
</a>

<form action="#" method="POST" class="float-right">
    @csrf
    @method('UPDATE')
    <button class="btn btn-warning btn-sm">Mark as Read</button>
</form>
