<nav class="navbar navbar-expand navbar-dark bg-dark static-top">
    <a class="navbar-brand mr-1" href="{{ route('dashboard.index') }}">Start Bootstrap</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar -->

    <ul class="navbar-nav ml-auto ml-md-0" style="position: relative;">
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-circle fa-fw"></i>
                @if(auth()->user()->unreadMessages()->count())
                <span class="badge badge-danger">{{auth()->user()->unreadMessages()->count()  }}</span>
                @endif
            </a>
            <div class="dropdown-menu dropdown-menu-left" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('users.profile') }}">Profile Settings</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
            </div>
            @include('modals.logoutModal')
        </li>
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="{{ route('messages.index') }}">
                <i class="fas fa-envelope"></i>
                <?php $alertCount = App\Alert::count(); ?>
                <span class="badge badge-danger">{{ $alertCount > 0 ? $alertCount : '' }}</span>
            </a>
        </li>

        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="{{ route('alerts.index') }}">
                <i class="fas fa-bell fa-fw"></i>
            </a>

        </li>

    </ul>

</nav>
