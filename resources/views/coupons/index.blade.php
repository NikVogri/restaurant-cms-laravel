<x-app>
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('dashboard.index') }}">Dashboard</a>
        </li>
    </ol>
    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Coupons <a href="{{ route('coupons.create') }}" class="btn btn-success btn-sm float-right">Add Coupon</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Coupon</th>
                            <th>Off Value</th>
                            <th>Valid Until</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($coupons as $coupon)
                        @if($coupon->isValid())
                        <tr>
                            <td>{{ $coupon->name }}</td>
                            <td>{{ $coupon->coupon }}</td>
                            <td>{{ $coupon->value }}{{ $coupon->type == 'percentage' ? '%' : '€' }}</td>
                            <td>{{ \Carbon\Carbon::parse($coupon->valid_until)->format('d M Y') }}</td>
                        </tr>
                        @else
                        <tr>
                            <td><del>{{ $coupon->name }}</del></td>
                            <td><del>{{ $coupon->coupon }}</del></td>
                            <td><del>{{ $coupon->value }}{{ $coupon->type == 'percentage' ? '%' : '€' }}</del></td>
                            <td><del>{{ \Carbon\Carbon::parse($coupon->valid_until)->format('d M Y') }}</del></td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
</x-app>
