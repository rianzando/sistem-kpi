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

            <div id="accordion">
                @foreach ($kpiCorporates as $kpicorporate)
                    <div class="card">
                        <div class="card-header" id="heading{{ $kpicorporate->id }}">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse"
                                    data-target="#collapse{{ $kpicorporate->id }}" aria-expanded="true"
                                    aria-controls="collapse{{ $kpicorporate->id }}">
                                    {{ $kpicorporate->goals }}
                                </button>
                            </h5>
                        </div>

                        <div id="collapse{{ $kpicorporate->id }}" class="collapse show"
                            aria-labelledby="heading{{ $kpicorporate->id }}" data-parent="#accordion">
                            <div class="card-body">
                                <table class="table table-responsive text-dark">
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
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $kpicorporate->goals }}</td>
                                            <td>{{ $kpicorporate->kpi_corporate }}</td>
                                            <td>{{ $kpicorporate->target_corporate }}</td>
                                            <td>{{ $kpicorporate->achievement }}</td>
                                        </tr>
                                        @foreach ($kpicorporate->kpidirectorates as $kpidirectorate)
                                            <tr>
                                                <td colspan="4"></td>
                                                <td>{{ $kpidirectorate->directorate->name }}</td>
                                                <td>{{ $kpidirectorate->kpi_directorate }}</td>
                                                <td>{{ $kpidirectorate->target }}</td>
                                                <td>{{ $kpidirectorate->achievement }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
