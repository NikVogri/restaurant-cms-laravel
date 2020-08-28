<x-app>

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('coupons.index') }}">Dashboard</a> / <a href="{{ route('coupons.index') }}">Coupons</a>
            / New
        </li>
    </ol>
    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Add New Coupon
        </div>
        <div class="card-body">
            <form action="{{ route('coupons.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}">
                    @error('name')
                    <p class="text-danger text-small">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="coupon">Coupon</label>
                    <input type="text" id="coupon" name="coupon" class="form-control">
                    @error('coupon')
                    <p class="text-danger text-small">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="coupon">Type</label>
                    <select id="type" name="type" class="form-control">
                        <option value="percentage">Percentage Subtraction (%)</option>
                        <option value="number">Number Subtraction</option>
                    </select>
                    @error('type')
                    <p class="text-danger text-small">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="value">Value</label>
                    <input type="number" id="value" name="value" class="form-control">
                    @error('value')
                    <p class="text-danger text-small">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="valid_for">Valid For</label>
                    <select type="date" id="price" name="valid_for" class="form-control">
                        <option value="1">1 Day</option>
                        <option value="7">7 Days</option>
                        <option value="31">31 Days</option>
                        <option value="183">6 Months</option>
                        <option value="365">12 Months</option>
                        <option value="forever">Forever</option>
                    </select>
                    @error('valid_for')
                    <p class="text-danger text-small">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add New</button>
                </div>

            </form>
        </div>
    </div>
    </div>
</x-app>
