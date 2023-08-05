<!-- resources/views/kpi_departements/index.blade.php -->
@extends('layouts.main')
@section('title', 'KPI Departements Monitoring')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <h4 class="page-title">KPI Departements Monitoring</h4>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">KPI Departements Monitoring</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">KPI Monitoring</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }} <i class="fas fa-check-circle"></i><button type="button"
                                    class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if (session()->has('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }} <i class="fas fa-times-circle"></i><button type="button"
                                    class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="table-responsive">
                                {{-- <a href="{{ route('kpidepartement.create') }}" class="btn btn-outline-success"><i
                                        class="fa fa-plus-circle"></i></a> --}}
                                <div class="card">
                                    {{-- <div class="card-header">
                                        <form action="{{ route('kpidepartement.index') }}" method="GET">
                                            <label for="perPage">Show:</label>
                                            <select name="perPage" id="perPage" onchange="this.form.submit()">
                                                @foreach ($entries as $entry)
                                                    <option value="{{ $entry }}"
                                                        {{ $perPage == $entry ? 'selected' : '' }}>
                                                        {{ $entry }}</option>
                                                @endforeach
                                            </select>
                                        </form>
                                        <div class="card-tools">
                                            <form action="{{ route('kpidepartement.index') }}" method="GET">
                                                <div class="input-group input-group-sm" style="width: 150px;">
                                                    <input type="text" name="search" value="{{ $search }}"
                                                        class="form-control float-right" placeholder="Search">
                                                    <div class="input-group-append">
                                                        <button type="submit" class="btn btn-default">
                                                            <i class="fas fa-search"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div> --}}
                                </div>
                                <table class="table table-bordered table-hover table-responsive-sm text-dark">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Departement</th>
                                            <th>Framework</th>
                                            <th>KPI Departement</th>
                                            <th>Target</th>
                                            <th>Year</th>
                                            <th>Achievement</th>
                                            <th>Status</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Current Progress</th>
                                            <th>Follow up</th>
                                            <th>Achievement</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kpidepartements as $kpiDepartement)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $kpiDepartement->departement->name }}</td>
                                                <td>{{ $kpiDepartement->framework }}</td>
                                                <td>{{ $kpiDepartement->kpi_departement }}</td>
                                                <td>{{ $kpiDepartement->target_departement }}</td>
                                                <td>{{ $kpiDepartement->year }}</td>
                                                <td>{{ $kpiDepartement->achievement }}</td>
                                                <td>
                                                    @if ($kpiDepartement->status == 'On Progress')
                                                        <span class="badge badge-primary">On progress</span>
                                                    @elseif ($kpiDepartement->status == 'Open')
                                                        <span class="badge badge-warning">Open</span>
                                                    @else
                                                        <span class="badge badge-success">Done</span>
                                                    @endif
                                                </td>
                                                @if ($kpiDepartement->monitorings->isEmpty())
                                                    <td colspan="6">No monitoring data available</td>
                                                @else
                                                    <td>{{ \Carbon\Carbon::parse($kpiDepartement->monitorings[0]->start_date)->format('Y-m-d') }}
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($kpiDepartement->monitorings[0]->end_date)->format('Y-m-d') }}
                                                    </td>
                                                    <td>{{ $kpiDepartement->monitorings[0]->current_progress }}</td>
                                                    <td>{{ $kpiDepartement->monitorings[0]->follow_up }}</td>
                                                    <td>{{ $kpiDepartement->monitorings[0]->achievement }}</td>
                                                    <td>{{ $kpiDepartement->monitorings[0]->status }}</td>
                                                @endif
                                            </tr>
                                            @if ($kpiDepartement->monitorings->count() > 1)
                                                @for ($i = 1; $i < $kpiDepartement->monitorings->count(); $i++)
                                                    <tr>
                                                        <td colspan="8"></td>
                                                        <td>{{ \Carbon\Carbon::parse($kpiDepartement->monitorings[0]->start_date)->format('Y-m-d') }}
                                                        </td>
                                                        <td>{{ \Carbon\Carbon::parse($kpiDepartement->monitorings[0]->end_date)->format('Y-m-d') }}
                                                        </td>
                                                        <td>{{ $kpiDepartement->monitorings[$i]->current_progress }}</td>
                                                        <td>{{ $kpiDepartement->monitorings[$i]->follow_up }}</td>
                                                        <td>{{ $kpiDepartement->monitorings[$i]->achievement }}</td>
                                                        <td>{{ $kpiDepartement->monitorings[$i]->status }}</td>
                                                    </tr>
                                                @endfor
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{ $kpidepartements->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
