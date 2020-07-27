<x-frontApp>
    <section class="site-cover" style="background-image: url(images/bg_3.jpg);" id="section-home">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center site-vh-200">
                <div class="col-md-12" style="height: 100px;"></div>
            </div>
        </div>
    </section>
    <div class="container my-5" style="min-height: 250px;">
        @if($cartItems->count() > 0)
        <div class="table-responsive">
            <table class="table table-bordered" cellspacing="0">

                <tbody>
                    @foreach ($cartItems as $cartItem)
                    <tr>
                        <td>{{ $cartItem->item->name}}</td>
                        <td>{{ $cartItem->item->price}}€</td>
                        <td class="text-center" width="100">

                            <form action="{{ route('cart.destroy', $cartItem->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button title="Remove Item" class="btn btn-primary">Remove</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <p class="font-weight-bold">Total Price: {{ $totalPrice }} €</p>
            <a href="{{ route('orders.create-new-order') }}" class="btn btn-primary">
                Order Now</a>
            <a href="/">Back</a>
        </div>
        @else
        <h4>No items yet!</h4>
        <a href="/">Back</a>
        @endif

    </div>

</x-frontApp>
