<nav class="navbar navbar-expand navbar-dark bg-dark static-top">
    <a class="navbar-brand mr-1" href="{{ route('dashboard.index') }}">Start Bootstrap</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar -->

    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-circle fa-fw"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-left" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">Settings</a>
                <a class="dropdown-item" href="#">Activity Log</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
            </div>
            @include('modals.logoutModal')
        </li>

        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="{{ route('messages.index') }}">
                <i class="fas fa-envelope"></i>
                <span class="badge badge-danger">0</span>
            </a>
        </li>

        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown">
                <i class="fas fa-bell fa-fw"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-left" aria-labelledby="alertsDropdown">
                <a class="dropdown-item" href="{{ route('alerts.index') }}">All Alerts</a>
                <a class="dropdown-item" href="{{ route('alerts.active') }}">Active Alerts</a>
                <a class="dropdown-item" href="{{ route('alerts.completed') }}">Completed Alerts</a>
            </div>
        </li>

    </ul>
</nav>
