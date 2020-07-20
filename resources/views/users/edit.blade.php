<x-app>

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('items.index') }}">Dashboard</a> / <a href="{{ route('users.index') }}">Users</a> /
            Edit
        </li>
    </ol>
    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Edit User
        </div>
        <div class="card-body">
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                {{-- <h4>Current Role: {{ $user->role }}</h4> --}}
                <div class="form-group">
                    <div class="form-group">
                        <label for="roles">Role</label>
                        <select id="roles" class="form-control" name="role_id">
                            {{-- @foreach ($roles as $role) --}}
                            <option value="1">test</option>
                            <option value="2">test</option>
                            <option value="3">test</option>
                            <option value="4">test</option>
                            {{-- @endforeach --}}
                        </select>
                    </div>
                    @error('name')
                    <p class="text-danger text-small">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
    </div>
</x-app>
