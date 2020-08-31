<x-frontApp>
    <section class="site-cover" style="background-image: url(images/bg_3.jpg);" id="section-home">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center site-vh-200">
                <div class="col-md-12" style="height: 100px;"></div>
            </div>
        </div>
    </section>
    <div class="container my-5" style="min-height: 250px;">
        @if($cart->items()->count() > 0)
        <div class="table-responsive">
            @include('cart.table')
            <p class="font-weight-bold">Total Price: {{ $cart->total_price }} €</p>
            <div class="d-flex justify-content-between">
                <div class="d-flex align-center">
                    <form action="{{ route('cart.index') }}" method="GET">
                        <input type="text" name="coupon" class="py-1 mr-2" placeholder="Have a coupon?">
                        <button type="submit" class="btn btn-primary">Apply</button>
                    </form>
                </div>
                <a href="{{ route('orders.create-new-order') }}" class="btn btn-primary">
                    Order Now</a>
            </div>
        </div>
        @else
        <h4>No items yet!</h4>
        <a href="/">Back</a>
        @endif
    </div>
</x-frontApp>
