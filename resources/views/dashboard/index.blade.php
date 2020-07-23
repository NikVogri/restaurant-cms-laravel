<x-app>

    <!-- Icon Cards-->
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fas fa-utensils"></i>
                    </div>
                    <div class="mr-5">{{ $itemCount }} Total Items</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{{ route('items.index') }}">
                    <span class="float-left">View All Items</span>
                    <span class="float-right">
                        <i class="fas fa-angle-right"></i>
                    </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-comments"></i>
                    </div>
                    <div class="mr-5">{{ $orderCount }} Total Orders</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{{ route('orders.index') }}">
                    <span class="float-left">View All Orders</span>
                    <span class="float-right">
                        <i class="fas fa-angle-right"></i>
                    </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-list"></i>
                    </div>
                    <div class="mr-5">{{ $categoryCount }} Total Categories</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{{ route('categories.index') }}">
                    <span class="float-left">View All Categories</span>
                    <span class="float-right">
                        <i class="fas fa-angle-right"></i>
                    </span>
                </a>
            </div>
        </div>
    </div>

</x-app>
