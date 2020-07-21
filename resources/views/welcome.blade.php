<x-master>
    <style>
        .full-height {
            height: 100vh;
        }

        .flex-center {
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

    </style>
    </head>

    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
            <div class="top-right links">
                @auth
                <a href="{{ route('cart.index') }}" class="mr-5"><i class="fas fa-shopping-cart"></i>View Cart</a>
                @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}">Register</a>
                @endif
                @endauth
            </div>
            @endif

            <div class="container  mt-5 mb-5">
                <h2 class="mb-3 text-center">Order Food Online!</h2>
                <div class="flex-center flex-wrap">
                    @foreach ($items as $item)
                    <div class="card m-2" style="width: 18rem;">
                        <img class="card-img-top" height="200" src="{{  asset($item->imagePath()) }}"
                            alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->name }}</h5>
                            <p class="card-text">{{ $item->description }}</p>
                            <form action="{{ route('cart.store', $item->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-primary" type="submit">Add to cart</button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="mt-3">
                    {{ $items->links() }}
                </div>
            </div>

        </div>

</x-master>
