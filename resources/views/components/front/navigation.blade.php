<nav class="navbar navbar-expand-lg navbar-dark site_navbar bg-dark site-navbar-light" id="site-navbar">
    <div class="container">
        <a class="navbar-brand" href="/">Demo Restaurant</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#site-nav"
            aria-controls="site-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="site-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="#section-home" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="/#section-menu" class="nav-link">Menu</a></li>
                <li class="nav-item"><a href="/#section-contact" class="nav-link">Contact</a></li>
                @auth
                <li class="nav-item {{ Request::path() == '/cart' ? 'active' : '' }}"><a
                        href="{{ route('cart.index') }}" class=" nav-link">View Cart</a>
                </li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST" class="logout">
                        @csrf
                        <input type="submit" value="LOGOUT" class="nav-link">
                    </form>
                </li>
                @else
                <li class="nav-item"><a href="{{ route('login') }}" class=" nav-link">Login</a></li>
                <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Register</a></li>
                @endauth

            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->
