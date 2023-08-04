@extends('layouts.main')
@section('title', 'KPI Monitoring')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <h4 class="page-title">KPI Monitoring</h4>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">KPI Monitoring</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">KPI</a></li>
                    </ol>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Monitoring KPI PT MPK</h5>
                    <div class="card-title">
                        <button class="btn btn-primary" onclick="exportToPDF()">Export to PDF</button>
                        <button class="btn btn-primary float-end" onclick="exportToExcel()">Export to Excel</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive text-dark" id="kpiTable">
                            <thead>
                                <tr>
                                    <th>Goals</th>
                                    <th>KPI</th>
                                    <th>Target</th>
                                    <th>Ach</th>
                                    <th>Directorate</th>
                                    <th>KPI</th>
                                    <th>Target</th>
                                    <th>Ach</th>
                                    <th>Department</th>
                                    <th>Framework</th>
                                    <th>KPI</th>
                                    <th>Target</th>
                                    <th>Ach</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kpicorporates as $kpicorporate)
                                    @foreach ($kpicorporate->kpidirectorates as $kpidirectorate)
                                        @foreach ($kpidirectorate->kpidepartement as $index => $item)
                                            <tr>
                                                @if ($index === 0)
                                                    <td rowspan="{{ count($kpidirectorate->kpidepartement) }}">
                                                        {{ $kpicorporate->goals }}</td>
                                                    <td rowspan="{{ count($kpidirectorate->kpidepartement) }}">
                                                        {{ $kpicorporate->kpi_corporate }}</td>
                                                    <td rowspan="{{ count($kpidirectorate->kpidepartement) }}">
                                                        {{ $kpicorporate->target_corporate }}</td>
                                                    <td rowspan="{{ count($kpidirectorate->kpidepartement) }}">
                                                        {{ $kpicorporate->achievement }}</td>
                                                    <td rowspan="{{ count($kpidirectorate->kpidepartement) }}">
                                                        {{ $kpidirectorate->directorate->name }}</td>
                                                    <td rowspan="{{ count($kpidirectorate->kpidepartement) }}">
                                                        {{ $kpidirectorate->kpi_directorate }}</td>
                                                    <td rowspan="{{ count($kpidirectorate->kpidepartement) }}">
                                                        {{ $kpidirectorate->target }}</td>
                                                    <td rowspan="{{ count($kpidirectorate->kpidepartement) }}">
                                                        {{ $kpidirectorate->achievement }}</td>
                                                @endif
                                                <td>{{ $item->departement->name }}</td>
                                                <td>{{ $item->framework }}</td>
                                                <td>{{ $item->kpi_departement }}</td>
                                                <td>{{ $item->target_departement }}</td>
                                                <td>{{ $item->achievement }}</td>
                                            </tr>
                                        @endforeach
                                        @if ($kpidirectorate->kpidepartement->isEmpty())
                                            <tr>
                                                <td rowspan="1">{{ $kpicorporate->goals }}</td>
                                                <td rowspan="1">{{ $kpicorporate->kpi_corporate }}</td>
                                                <td rowspan="1">{{ $kpicorporate->target_corporate }}</td>
                                                <td rowspan="1">{{ $kpicorporate->achievement }}</td>
                                                <td rowspan="1">{{ $kpicorporate->achievement }}</td>
                                                <td rowspan="1">{{ $kpidirectorate->kpi_directorate }}</td>
                                                <td rowspan="1">{{ $kpidirectorate->target }}</td>
                                                <td rowspan="1">{{ $kpidirectorate->achievement }}</td>
                                                <td colspan="5">No data available</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    @if ($kpicorporate->kpidirectorates->isEmpty())
                                        <tr>
                                            <td rowspan="1">{{ $kpicorporate->goals }}</td>
                                            <td rowspan="1">{{ $kpicorporate->kpi_corporate }}</td>
                                            <td rowspan="1">{{ $kpicorporate->target_corporate }}</td>
                                            <td rowspan="1">{{ $kpicorporate->achievement }}</td>
                                            <td colspan="7">No data available</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $kpicorporates->links() }}
                </div>
            </div>
        </div>
    </div>
    <script>
        // Function to export the table data to PDF
        function exportToPDF() {
            const element = document.querySelector('#kpiTable');
            html2pdf()
                .from(element)
                .save('kpimonitoring.pdf');
        }

        // Function to export the table data to Excel
        function exportToExcel() {
            const table = document.querySelector('#kpiTable');
            const workbook = XLSX.utils.table_to_book(table);
            XLSX.writeFile(workbook, 'kpimonitoring.xlsx');
        }
    </script>
@endsection
