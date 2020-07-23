<x-app>

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('dashboard.index') }}">Dashboard</a> / <a
                href="{{ route('categories.index') }}">Categories</a> / New
        </li>
    </ol>
    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Create New Message
        </div>

        <div class="card-body">
            <form action="{{ route('messages.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <input name="select_all" type="checkbox">
                    <label for="group">Send to every staff member</label>
                    <p class="small">* If this is selected then every staff member receives the message and the Name
                        selection is not necessary</p>
                </div>

                <div class="form-group">
                    <label for="user">Staff</label>
                    <select name="users[]" id="user" class="form-control" multiple>
                        @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }} - {{ ucfirst($user->getRoleNames()[0]) }}
                        </option>
                        @endforeach
                    </select>

                    @error('users')
                    <p class="text-danger text-small">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="name">Title</label>
                    <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}">
                    @error('title')
                    <p class="text-danger text-small">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="body">Message</label>
                    <textarea class="form-control" name="body" cols="30" rows="10">{{ old('body') }}</textarea>
                    @error('body')
                    <p class="text-danger text-small">{{ $message }}</p>
                    @enderror
                </div>


                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </div>

            </form>
        </div>
    </div>
    </div>

</x-app>
