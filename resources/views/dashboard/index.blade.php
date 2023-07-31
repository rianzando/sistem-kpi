@extends('layouts.main')
@section('title', 'dashboard')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Hi, welcome back!</h4>
                        <span class="ml-1">{{ Auth::user()->name }}</span>
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
                                <i class="ti-user text-pink border-pink"></i>
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
                                <i class="fas fa-chart-bar text-pink"></i>
                                <!-- Replace this with the appropriate Font Awesome icon class -->
                            </div>
                            <div class="stat-content d-inline-block">
                                <div class="stat-text">KPI Directorate</div>
                                <div class="stat-digit">{{ $countkpidirectorate }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="stat-widget-one card-body">
                            <div class="stat-icon d-inline-block">
                                <i class="ti-pie-chart text-pink border-pink"></i>
                            </div>
                            <div class="stat-content d-inline-block">
                                <div class="stat-text">KPI Departement</div>
                                <div class="stat-digit">{{ $countkpidepartement }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="card">
                        <div class="stat-widget-one card-body">
                            <div class="stat-icon d-inline-block">
                                <i class="fas fa-thumbs-up text-pink border-pink"></i>
                            </div>
                            <div class="stat-content d-inline-block">
                                <div class="stat-text">Done</div>
                                <div class="stat-digit">{{ $countdone }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="card">
                        <div class="stat-widget-one card-body">
                            <div class="stat-icon d-inline-block">
                                <i class="fas fa-sync text-pink border-pink"></i>
                            </div>
                            <div class="stat-content d-inline-block">
                                <div class="stat-text">On Progress</div>
                                <div class="stat-digit">{{ $countprogress }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="card">
                        <div class="stat-widget-one card-body">
                            <div class="stat-icon d-inline-block">
                                <i class="fas fa-lock-open text-pink border-pink"></i>
                            </div>
                            <div class="stat-content d-inline-block">
                                <div class="stat-text">Open</div>
                                <div class="stat-digit">{{ $countopen }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="departmentDropdown">Select Department:</label>
                    <select id="departmentDropdown">
                        <option value="all">All Departments</option>
                        @foreach ($departements as $departement)
                            <option value="{{ $departement->id }}">{{ $departement->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div id="container"></div>
                </div>
                <div class="col-md-6">
                    <div id="container3"></div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-6">
                    <div id="container2"></div>
                </div>
                <div class="col-md-6">
                    <div id="container4"></div>
                    {{-- <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h5 class="pb-3">5 Last Data Achivement Departement</h5>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-responsive-sm" height="300">
                                    <thead>
                                        <tr>
                                            <th>Departement</th>
                                            <th>KPI Departement</th>
                                            <th>Achievement</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    @foreach ($kpidepartements as $kpidepartement)
                                        <tbody>
                                            <tr>
                                                <td>{{ $kpidepartement->departement->name }}</td>
                                                <td>{{ $kpidepartement->kpi_departement }}</td>
                                                <td>{{ $kpidepartement->achievement }}</td>
                                                <td>
                                                    @if ($kpidepartement->status == 'Open')
                                                        <span class="badge badge-warning">Open</span>
                                                    @elseif ($kpidepartement->status == 'On Progress')
                                                        <span class="badge badge-primary">On Progress</span>
                                                    @else
                                                        <span class="badge badge-success">Done</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <script src="{{ asset('back/js/dashboard/dashboard-1.js') }}"></script> --}}
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/highcharts-3d.js"></script>
    <script src="https://code.highcharts.com/modules/cylinder.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script>
        // Function to fetch chart data via AJAX with a department filter
        async function getChartDataWithFilter(endpoint, department) {
            const url = department === 'all' ?
                endpoint :
                `${endpoint}?department=${encodeURIComponent(department)}`;
            const response = await fetch(url);
            return response.json();
        }

        // Function to generate random colors
        function getRandomColor() {
            return '#' + Math.floor(Math.random() * 16777215).toString(16);
        }

        // Global variables to store Highcharts objects
        let achievementChart;
        let statusChart;

        // Function to create and update the achievement chart
        async function createAchievementChart(selectedDepartment) {
            const endpoint = 'http://127.0.0.1:8000/dashboard/kpidepartement/chart-data';
            const data = await getChartDataWithFilter(endpoint, selectedDepartment);
            console.log("Selected Department:", selectedDepartment);

            console.log("Achievement Chart Data:", data); // Add this line to check the data

            // Generate random colors for each data point in the series
            const colors = data.achievement.map(() => getRandomColor());

            // Destroy the existing chart if it exists
            if (achievementChart) {
                achievementChart.destroy();
            }

            achievementChart = Highcharts.chart('container', {
                chart: {
                    type: 'bar',
                    options3d: {
                        enabled: true,
                        alpha: 15,
                        beta: 15,
                        depth: 50,
                        viewDistance: 25
                    }
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
                plotOptions: {
                    cylinder: {
                        dataLabels: {
                            enabled: true,
                            format: '{y}%',
                        },
                        colorByPoint: true,
                    }
                },
                series: [{
                    name: 'Achievement',
                    data: data.achievement.map((value, index) => ({
                        y: value,
                        color: colors[index],
                    })),
                }],
                exporting: {
                    buttons: {
                        contextButton: {
                            menuItems: ['downloadPNG', 'downloadJPEG', 'downloadPDF', 'downloadSVG'],
                        },
                    },
                },
            });
        }

        // Function to create and update the status chart
        async function createStatusChart(selectedDepartment) {
            const endpoint = '/dashboard/kpidepartementstatus/chart-data';
            const data = await getChartDataWithFilter(endpoint, selectedDepartment);
            console.log("Status Chart Data:", data); // Add this line to check the data

            // Destroy the existing chart if it exists
            if (statusChart) {
                statusChart.destroy();
            }

            statusChart = Highcharts.chart('container3', {
                chart: {
                    type: 'column',
                },
                title: {
                    text: 'KPI Departement Status',
                },
                xAxis: {
                    categories: data.department_names,
                },
                yAxis: {
                    title: {
                        text: 'Status Count',
                    },
                },
                series: [{
                    name: 'Open',
                    data: data.status_counts.map(counts => counts['Open']),
                    color: '#BBE83B',
                }, {
                    name: 'On Progress',
                    data: data.status_counts.map(counts => counts['On Progress']),
                }, {
                    name: 'Done',
                    data: data.status_counts.map(counts => counts['Done']),
                }],
                exporting: {
                    buttons: {
                        contextButton: {
                            menuItems: ['downloadPNG', 'downloadJPEG', 'downloadPDF', 'downloadSVG'],
                        },
                    },
                },
            });
        }

        // Event listener for the department dropdown change
        document.getElementById('departmentDropdown').addEventListener('change', () => {
            const selectedDepartment = document.getElementById('departmentDropdown').value;
            createAchievementChart(selectedDepartment);
            createStatusChart(selectedDepartment);
        });

        // Call the initial chart creation functions to load the charts with "All Departments" data
        createAchievementChart('all');
        createStatusChart('all');
    </script>






    {{-- grafik directorate  --}}
    <script>
        // Function to fetch chart data via AJAX
        function getChartData() {
            return fetch('http://127.0.0.1:8000/dashboard/kpidirectorate/chart-data')
                .then(response => response.json());
        }

        // Function to create and update the chart
        async function createChart() {
            const data = await getChartData();

            Highcharts.chart('container2', {
                chart: {
                    type: 'bar',
                    options3d: {
                        enabled: true,
                        alpha: 15,
                        beta: 15,
                        depth: 50,
                        viewDistance: 25
                    } // Change this to the desired chart type (e.g., line, bar, pie, etc.)
                },
                title: {
                    text: 'KPI Directorate Achievement',
                },
                xAxis: {
                    categories: data.directorate_names,
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
                    color: '#BBE83B',
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
    <!-- Script to fetch chart data via AJAX -->
    <script>
        function getStatusChartData() {
            return fetch('http://127.0.0.1:8000/dashboard/kpidirectoratestatus/chart-data')
                .then(response => response.json());
        }

        // Function to create and update the status chart
        async function createStatusChart() {
            const data = await getStatusChartData();

            Highcharts.chart('container4', {
                chart: {
                    type: 'column', // Change the chart type to 'column'
                },
                title: {
                    text: 'KPI Directorate Status',
                },
                xAxis: {
                    categories: data.directorate_names,
                },
                yAxis: {
                    title: {
                        text: 'Status Count',
                    },
                },
                series: [{
                    name: 'Open',
                    data: data.status_counts.map(counts => counts['Open']),
                    color: '#FF0000', // You can customize the color for each status if needed
                }, {
                    name: 'On Progress',
                    data: data.status_counts.map(counts => counts['On Progress']),
                    color: '#00FF00',
                }, {
                    name: 'Done',
                    data: data.status_counts.map(counts => counts['Done']),
                    color: '#0000FF',
                }],
                exporting: {
                    buttons: {
                        contextButton: {
                            menuItems: ['downloadPNG', 'downloadJPEG', 'downloadPDF', 'downloadSVG'],
                        },
                    },
                },
            });
        }

        // Call the createStatusChart function to create the status chart
        createStatusChart();
    </script>
@endsection
