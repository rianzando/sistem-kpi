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
                    <button onclick="filterByDepartment()">Filter</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div id="kpiChartContainer"></div>
                </div>
                <div class="col-md-6">
                    <div id="statusChartContainer"></div>
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
        let chart;
        let statusChart;

        function fetchChartData(departmentId) {
            fetch(`/api/kpi-data/${departmentId}`)
                .then(response => response.json())
                .then(data => {
                    updateChart(data);
                })
                .catch(error => {
                    console.error('Error fetching KPI data:', error);
                });
        }

        function fetchStatusChartData(departmentId) {
            fetch(`/api/kpi-status-data/${departmentId}`)
                .then(response => response.json())
                .then(data => {
                    updateStatusChart(data);
                })
                .catch(error => {
                    console.error('Error fetching status data:', error);
                });
        }

        // Function to generate random colors for the series
        function generateRandomColors(count) {
            const colors = [];
            for (let i = 0; i < count; i++) {
                const color = '#' + Math.floor(Math.random() * 16777215).toString(16);
                colors.push(color);
            }
            return colors;
        }

        // Function to update the average achievement chart with new data
        function updateChart(data) {
            if (chart) {
                chart.destroy();
            }

            const seriesColors = generateRandomColors(data.department_names.length);

            chart = Highcharts.chart('kpiChartContainer', {
                chart: {
                    type: 'bar'
                },
                title: {
                    text: 'Average Achievement Department'
                },
                xAxis: {
                    categories: data.department_names
                },
                yAxis: {
                    title: {
                        text: 'Average Achievement'
                    }
                },
                plotOptions: {
                    bar: {
                        colors: seriesColors,
                        dataLabels: {
                            enabled: true,
                            format: '{y}', // Show the achievement value on top of each bar
                            style: {
                                fontSize: '12px',
                                fontWeight: 'bold',
                                color: 'white'
                            }
                        } // Assign random colors to the series
                    }
                },
                series: [{
                    name: 'Average Achievement',
                    data: data.achievement
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

        // Function to update the status chart with new data
        function updateStatusChart(data) {
            if (!data || !data.department_names || !Array.isArray(data.status_counts)) {
                console.error('Invalid status data received:', data);
                return;
            }

            if (statusChart) {
                statusChart.destroy();
            }

            statusChart = Highcharts.chart('statusChartContainer', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Status Counts for Each Department'
                },
                xAxis: {
                    categories: data.department_names
                },
                yAxis: {
                    title: {
                        text: 'Count'
                    },
                    min: 0 // Set the minimum value of the y-axis to 0
                },
                plotOptions: {
                    column: {
                        stacking: 'normal'
                    }
                },
                series: [{
                    name: 'Open',
                    data: data.status_counts.map(item => item['Open'] || 0)
                }, {
                    name: 'On Progress',
                    data: data.status_counts.map(item => item['On Progress'] || 0)
                }, {
                    name: 'Done',
                    data: data.status_counts.map(item => item['Done'] || 0)
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

        // Function to handle filtering based on the selected department
        function filterByDepartment() {
            const selectedDepartmentId = document.getElementById("departmentDropdown").value;
            fetchChartData(selectedDepartmentId);
            fetchStatusChartData(selectedDepartmentId);
        }

        // Initially, load the charts with all departments data
        fetchChartData('all');
        fetchStatusChartData('all');
    </script>
@endsection
