<div id="wrapper">
    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('dashboard.index') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link" href="{{ route('orders.index') }}">
        <i class="fas fa-sort-amount-up"></i>
        <span>Orders</span></a>
        </li> --}}

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-folder"></i>
                <span>Orders</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <h6 class="dropdown-header">Orders:</h6>
                <a class="dropdown-item" href="{{ route('orders.index') }}"><i class="fas fa-table"></i> All Orders</a>
                <a class="dropdown-item" href="{{ route('orders.new') }}"><i class="fas fa-rss"></i> New Orders</a>
                <a class="dropdown-item" href="{{ route('orders.completed') }}"><i class="fas fa-check"></i> Completed
                    Orders</a>
                <div class="dropdown-divider"></div>
                <h6 class="dropdown-header">Other:</h6>
                <a class="dropdown-item" href="{{ route('payments.index') }}">Edit Payments</a>
            </div>
        </li>


        <li class="nav-item">
            <a class="nav-link" href="{{ route('categories.index') }}">
                <i class="fas fa-chart-bar"></i>
                <span>Categories</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('items.index') }}">
                <i class="fas fa-utensils"></i>
                <span>Items</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('users.index') }}">
                <i class="fas fa-user"></i>
                <span>Users</span>
            </a>
        </li>
    </ul>
