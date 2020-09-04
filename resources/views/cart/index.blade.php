<x-frontApp>
    <section class="site-cover" style="background-image: url(images/bg_3.jpg);" id="section-home">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center site-vh-200">
                <div class="col-md-12" style="height: 100px;"></div>
            </div>
        </div>
    </section>
    <div class="container my-5" style="min-height: 250px;">
        @if(count($cart->items) > 0) <div class="table-responsive">
            @include('cart.table')
            <p class="font-weight-bold">Total Price: {{ $cart->total_price }} €</p>
            <div class="d-flex justify-content-between">
                @if(!$cart->coupon)
                <div class="d-flex align-center">
                    <form action="{{ route('cart.index') }}" method="GET">
                        <input type="text" name="coupon" class="py-1 mr-2" placeholder="Have a coupon?">
                        <button type="submit" class="btn btn-primary">Apply</button>
                    </form>
                </div>
                @else
                <div>
                    <hr>
                    <p class="mb-1">Coupon Applied: {{ $cart->coupon->coupon }} -
                        @if($cart->coupon->type == 'percentage')
                        {{ $cart->coupon->value }}%
                        @else
                        {{ $cart->coupon->value }}€
                        @endif
                    </p>
                    <a href="{{ route('cart.remove-coupon') }}">Remove coupon</a>
                </div>
                @endif

                <div>
                    <a href="{{ route('checkout.index') }}" class="btn btn-primary">
                        Next Step</a>
                </div>
            </div>
        </div>
        @else
        <h4>No items yet!</h4>
        <a href="/">Back</a>
        @endif
    </div>
</x-frontApp>
