<x-frontApp>
    @section('head')
    @endsection
    <section class="site-cover" style="background-image: url(../images/bg_3.jpg);">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center site-vh-200">
                <div class="col-md-12" style="height: 100px;"></div>
            </div>
        </div>
    </section>

    <div class="container my-5" style="min-height: 250px;">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Current Address</h5>
                <p>{{ auth()->user()->name }}, {{ auth()->user()->address->street_name }},
                    {{ auth()->user()->address->street_num }}, {{ auth()->user()->address->city }} </p>
            </div>
        </div>
        <div class="card mt-2">
            <div class="card-body">
                <table class="w-100">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Price</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cart->items as $item)
                        <tr>
                            <td>{{ $item->item->name }}</td>
                            <td>{{ $item->item->price * $item->quantity }}€</td>
                            <td>{{ $item->quantity }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <hr>
                <h5>Total Price: {{ $cart->total_price }}€</h5>
                @if($cart->coupon)
                <h6>Coupon applied:
                    {{ $cart->coupon->coupon }}
                    {{ $cart->coupon->value }}{{$cart->coupon->type == 'percentage' ? '%' : '€' }}
                </h6>
                @endif
            </div>
        </div>
        <div class="card mt-2">
            <div class="card-body">
                <div class="text-center d-flex align-items-center justify-content-center">
                    <a href="{{ route('orders.create-new-order') }}" class="btn btn-primary">
                        Order Now</a>
                    <p class="my-3 mx-3">or</p>
                    <a href="{{ route('payment.index') }}" class="btn btn-primary ">Pay With Credit Card</a>
                </div>
            </div>
        </div>
    </div>
</x-frontApp>
