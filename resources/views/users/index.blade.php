<x-app>
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('dashboard.index') }}">Dashboard</a> / Users
        </li>
    </ol>
    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            All Users
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Payment method</th>
                            <th>Created at</th>
                            <th>Total Orders</th>
                            <th>Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ isset($user->paymentType) ?  $user->paymentType->payment->name  : 'Not Set' }}
                            </td>
                            <td>{{ $user->created_at }}</td>
                            <td>{{ $user->orders->count() }}</td>
                            <td>
                                @foreach ($user->roles as $role)
                                <span>{{ ucwords($role->name) }}</span>
                                @endforeach
                                <a href="{{ route('users.edit', $user->id) }}">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    @include('modals.userEdit')
</x-app>
