<x-app>

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('dashboard.index') }}">Dashboard</a> / User
        </li>
    </ol>
    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Edit User Profile
        </div>
        <div class="row">
            <div class="col-xl-4 m-auto">
                <div class="card-body">
                    <form action="{{ route('users.updateProfile', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                            @error('name')
                            <p class="text-danger text-small">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}"">
                            @error('email')
                            <p class=" text-danger text-small">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number"
                                value="{{ $user->phone_number }}">
                            @error('phone_number')
                            <p class=" text-danger text-small">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="payment">Preferred Payment Type</label>
                            <select name="payment_type_id" id="payment" class="form-control">
                                @foreach ($paymentTypes as $paymentType)
                                <option value="{{ $paymentType->id }}"
                                    {{ $user->payment->id === $paymentType->id ? 'selected' : ''}}>
                                    {{ $paymentType->name }}</option>
                                @endforeach
                            </select>

                            @error('payment_type_id')
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
    </div>
    </div>
</x-app>
