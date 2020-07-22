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
            <div class="d-flex align-items-center">
                <h4>Current Roles:</h4>
                @forelse ($user->roles as $role)
                <span class="ml-2 bg-danger text-light rounded-top rounded-bottom p-1">{{ $role->name }}</span>
                @empty
                <span class="ml-2">No roles assigned</span>
                @endforelse
            </div>
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <div class="form-group">
                        <label for="roles">Role</label>
                        <select id="roles" class="form-control" name="role">
                            @foreach ($roles as $role)
                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('name')
                    <p class="text-danger text-small">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update User</button>
                </div>
            </form>
        </div>
    </div>
    </div>
</x-app>
