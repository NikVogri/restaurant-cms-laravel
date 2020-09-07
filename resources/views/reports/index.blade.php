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
            <div class="col-md-4">

                <div class="card  my-1">

                    <ul class="nav py-2">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('reports.index', ['range' => 'today'])}}">Today</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('reports.index', ['range' => 'week'])}}">Week</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('reports.index', ['range' => 'month'])}}">Month</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{route('reports.index', ['range' => 'last_month'])}}">Last
                                Month</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{route('reports.index', ['range' => 'year'])}}">Year</a>
                        </li>

                        <li class="nav-item mt-3" style="margin-left: 1rem;">
                            <form method="GET">
                                <div>
                                    <input type="hidden" name="range" value="custom">
                                    <input type="date" name="start_date"> and <input type="date" name="end_date">
                                </div>
                                <button class="btn btn-outline-secondary btn-sm d-block mt-2" type="submit">Go</button>
                            </form>
                        </li>

                    </ul>
                </div>

                <div class="card mb-1">
                    <div class="card-body">
                        <small>Earnings In This Period:</small>
                        <strong>{{ number_format($orders_earnings, null, null, ',' ) }}€</strong>
                    </div>
                </div>

                <div class="card mb-1">
                    <div class="card-body">
                        <small>Orders Placed In This Period:</small>
                        <strong>{{ number_format($orders_count, null, null, ',' )}}</strong>
                    </div>
                </div>

                <div class="card  mb-1">
                    <div class="card-body">
                        <small>Items Purchased In This Period:</small>
                        <strong>{{ number_format($items_count, null, null, ',' )}}</strong>
                    </div>
                </div>

                <div class="card mb-1">
                    <div class="card-body">
                        <small>Coupons Used In This Period:</small>
                        <strong>{{ number_format($coupons_count, null, null, ',' ) }}</strong>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"
                    integrity="sha512-vBmx0N/uQOXznm/Nbkp7h0P1RfLSj0HQrFSzV8m7rOGyj30fYAOKHYvCNez+yM8IrfnW0TCodDEjRqf6fodf/Q=="
                    crossorigin="anonymous"></script>
                <canvas id="myChart"></canvas>
                <script>
                    var ctx = document.getElementById('myChart').getContext('2d');
                    var data = @json($chart_data);

                    let monthNames = [];

                    // check if data provided is in months
                    if (Object.keys(data)[0].length == 2) {
                        var month = new Array();
                        month[0] = "January";
                        month[1] = "February";
                        month[2] = "March";
                        month[3] = "April";
                        month[4] = "May";
                        month[5] = "June";
                        month[6] = "July";
                        month[7] = "August";
                        month[8] = "September";
                        month[9] = "October";
                        month[10] = "November";
                        month[11] = "December";
                        for (key in data) {
                            monthNames.push(month[key.split('')[1] - 1]);
                        }
                    }

                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: monthNames.length > 0 ? monthNames : Object.keys(data),
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
