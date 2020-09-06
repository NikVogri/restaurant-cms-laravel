<x-app>
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('dashboard.index') }}">Dashboard</a> / Reports
        </li>
    </ol>
    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="row">
            <div class="col-md-3">


                <div class="card mb-1">
                    <div class="card-body">
                        <small>Earnings In This Period:</small>
                        <strong>{{ $orders_earnings }}€</strong>
                    </div>
                </div>

                <div class="card mb-1">
                    <div class="card-body">
                        <small>Orders Placed In This Period:</small> <strong>{{ $orders_count }}</strong>
                    </div>
                </div>

                <div class="card  mb-1">
                    <div class="card-body">
                        <small>Items Purchased In This Period:</small> <strong>{{ $items_count }}</strong>
                    </div>
                </div>

                <div class="card mb-1">
                    <div class="card-body">
                        <small>Coupons Used In This Period:</small> <strong>{{ $coupons_count }}</strong>
                    </div>
                </div>

            </div>

            <div class="col-md-9">
                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"
                    integrity="sha512-vBmx0N/uQOXznm/Nbkp7h0P1RfLSj0HQrFSzV8m7rOGyj30fYAOKHYvCNez+yM8IrfnW0TCodDEjRqf6fodf/Q=="
                    crossorigin="anonymous"></script>
                <canvas id="myChart"></canvas>
                <script>
                    var ctx = document.getElementById('myChart').getContext('2d');
                    var data = @json($chart_data);

                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: Object.keys(data),
                            datasets: [{
                                label: 'Orders Placed',
                                data: Object.values(data),
                                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true,
                                    },
                                }]
                            }
                        }
                    });

                </script>
            </div>
        </div>
    </div>


</x-app>
