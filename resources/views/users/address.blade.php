<x-app>

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('dashboard.index') }}">Dashboard</a> / User
        </li>
    </ol>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <ul class="list-group mb-3">
                    <li class="list-group-item"><a href="{{ route('users.profile') }}">Profile</a></li>
                    <li class="list-group-item active">Address</li>
                </ul>
            </div>
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-table"></i>
                        Edit Address
                    </div>
                    <div class="card-body">
                        @if($user->address)
                        <form action="{{ route('users.updateAddress', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" class="form-control" id="city" name="city"
                                    value="{{ $user->address->city }}">
                                @error('city')
                                <p class="text-danger text-small">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="post_code">Post Code</label>
                                <input type="text" class="form-control" id="post_code" name="post_code"
                                    value="{{ $user->address->post_code }}">
                                @error('post_code')
                                <p class="text-danger text-small">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="street_name">Street Name</label>
                                <input type="text" class="form-control" id="street_name" name="street_name"
                                    value="{{ $user->address->street_name }}">
                                @error('street_name')
                                <p class="text-danger text-small">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="street_num">Street Number</label>
                                <input type="text" class="form-control" id="street_num" name="street_num"
                                    value="{{ $user->address->street_num }}">
                                @error('street_num')
                                <p class=" text-danger text-small">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update User</button>
                            </div>
                        </form>
                        @else
                        <form action="{{ route('users.addAddress', $user->id) }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" class="form-control" id="city" name="city">
                                @error('city')
                                <p class="text-danger text-small">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="post_code">Post Code</label>
                                <input type="text" class="form-control" id="post_code" name="post_code">
                                @error('post_code')
                                <p class="text-danger text-small">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="street_name">Street Name</label>
                                <input type="text" class="form-control" id="street_name" name="street_name">
                                @error('street_name')
                                <p class="text-danger text-small">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="street_num">Street Number</label>
                                <input type="text" class="form-control" id="street_num" name="street_num">
                                @error('street_num')
                                <p class="text-danger text-small">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update Address</button>
                            </div>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>




    </div>
</x-app>
