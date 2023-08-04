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
                @foreach ($kpicorporates as $kpicorporate)
                    <div class="card">
                        <div class="card-header" id="heading{{ $kpicorporate->id }}">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse"
                                    data-target="#collapse{{ $kpicorporate->id }}" aria-expanded="true"
                                    aria-controls="collapse{{ $kpicorporate->id }}">
                                    {{ $kpicorporate->goals }} -> {{ $kpicorporate->target_corporate }}
                                </button>
                            </h5>
                        </div>

                        <div id="collapse{{ $kpicorporate->id }}" class="collapse show"
                            aria-labelledby="heading{{ $kpicorporate->id }}" data-parent="#accordion">
                            <div class="card-body">
                                <p>Monitoring KPI PT MPK</p>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-responsive text-dark">
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
                                                <th>Departement</th>
                                                <th>Framework</th>
                                                <th>KPI</th>
                                                <th>Target</th>
                                                <th>Ach</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($kpicorporate->kpidirectorates as $index => $kpidirectorate)
                                                <tr>
                                                    @if ($index === 0)
                                                        <td
                                                            rowspan="{{ count($kpicorporate->kpidirectorates) + count($kpidirectorate->kpidepartement) + 1 }}">
                                                            {{ $kpicorporate->goals }}</td>
                                                        <td
                                                            rowspan="{{ count($kpicorporate->kpidirectorates) + count($kpidirectorate->kpidepartement) + 1 }}">
                                                            {{ $kpicorporate->kpi_corporate }}</td>
                                                        <td
                                                            rowspan="{{ count($kpicorporate->kpidirectorates) + count($kpidirectorate->kpidepartement) + 1 }}">
                                                            {{ $kpicorporate->target_corporate }}</td>
                                                        <td
                                                            rowspan="{{ count($kpicorporate->kpidirectorates) + count($kpidirectorate->kpidepartement) + 1 }}">
                                                            {{ $kpicorporate->achievement }}</td>
                                                    @endif
                                                    <td rowspan="{{ count($kpidirectorate->kpidepartement) + 1 }}">
                                                        {{ $kpidirectorate->directorate->name }}</td>
                                                    <td rowspan="{{ count($kpidirectorate->kpidepartement) + 1 }}">
                                                        {{ $kpidirectorate->kpi_directorate }}</td>
                                                    <td rowspan="{{ count($kpidirectorate->kpidepartement) + 1 }}">
                                                        {{ $kpidirectorate->target }}</td>
                                                    <td rowspan="{{ count($kpidirectorate->kpidepartement) + 1 }}">
                                                        {{ $kpidirectorate->achievement }}</td>
                                                </tr>
                                                @foreach ($kpidirectorate->kpidepartement as $item)
                                                    <tr>
                                                        <td>{{ $item->departement->name }}</td>
                                                        <td>{{ $item->framework }}</td>
                                                        <td>{{ $item->kpi_departement }}</td>
                                                        <td>{{ $item->target_departement }}</td>
                                                        <td>{{ $item->achievement }}</td>
                                                    </tr>
                                                @endforeach
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{ $kpicorporates->links() }}
    </div>

@endsection
