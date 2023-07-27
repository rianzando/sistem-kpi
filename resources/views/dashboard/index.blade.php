@extends('layouts.main')
@section('title', 'dashboard')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Hi, welcome back!</h4>
                        <span class="ml-1">Feriansyah Turmudi Putra</span>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="stat-widget-one card-body">
                            <div class="stat-icon d-inline-block">
                                <i class="ti-user text-primary border-primary"></i>
                            </div>
                            <div class="stat-content d-inline-block">
                                <div class="stat-text">User</div>
                                <div class="stat-digit">{{ $usercount }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="stat-widget-one card-body">
                            <div class="stat-icon d-inline-block">
                                <i class="ti-layout-grid2 text-pink border-pink"></i>
                            </div>
                            <div class="stat-content d-inline-block">
                                <div class="stat-text">KPI Corporate</div>
                                <div class="stat-digit">{{ $countkpicorporate }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="stat-widget-one card-body">
                            <div class="stat-icon d-inline-block">
                                <i class="ti-layout-grid2 text-pink border-pink"></i>
                            </div>
                            <div class="stat-content d-inline-block">
                                <div class="stat-text">KPI Corporate</div>
                                <div class="stat-digit">{{ $countkpicorporate }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="stat-widget-one card-body">
                            <div class="stat-icon d-inline-block">
                                <i class="ti-layout-grid2 text-pink border-pink"></i>
                            </div>
                            <div class="stat-content d-inline-block">
                                <div class="stat-text">KPI Corporate</div>
                                <div class="stat-digit">{{ $countkpicorporate }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div id="container"></div>
                </div>
            </div>
        </div>
    </div>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <script src="{{ asset('back/js/dashboard/dashboard-1.js') }}"></script> --}}
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script>
        // Function to fetch chart data via AJAX
        function getChartData() {
            return fetch('http://127.0.0.1:8000/dashboard/kpidepartement/chart-data')
                .then(response => response.json());
        }

        // Function to create and update the chart
        async function createChart() {
            const data = await getChartData();

            Highcharts.chart('container', {
                chart: {
                    type: 'bar', // Change this to the desired chart type (e.g., line, bar, pie, etc.)
                },
                title: {
                    text: 'KPI Departement Achievement',
                },
                xAxis: {
                    categories: data.department_names,
                },
                yAxis: {
                    title: {
                        text: 'Achievement',
                    },
                    min: 0,
                    max: 100,
                },
                series: [{
                    name: 'Achievement',
                    data: data.achievement,
                    color: 'rgba(75, 192, 192, 0.2)',
                }],
                // Add exporting options for drilldown
                exporting: {
                    buttons: {
                        contextButton: {
                            menuItems: ['downloadPNG', 'downloadJPEG', 'downloadPDF', 'downloadSVG'],
                        },
                    },
                },
            });
        }

        // Call the createChart function to create the chart
        createChart();
    </script>

@endsection
