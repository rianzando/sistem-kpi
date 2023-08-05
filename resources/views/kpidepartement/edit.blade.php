<!-- resources/views/kpi_departements/edit.blade.php -->
@extends('layouts.main')
@section('title', 'Edit KPI Departement')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <h4 class="page-title">Edit KPI Departement</h4>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">KPI Departements</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('kpidepartement.index') }}">Index</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-lg-12">
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
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('kpidepartement.update', $kpiDepartement->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="kpi_directorate_id">KPI Directorate</label>
                                            <select class="form-control" id="kpi_directorate_id" name="kpi_directorate_id"
                                                required>
                                                <option value="" selected disabled>Select KPI Directorate</option>
                                                @foreach ($kpidirectorates as $kpidirectorate)
                                                    <option value="{{ $kpidirectorate->id }}"
                                                        @if ($kpiDepartement->kpi_directorate_id == $kpidirectorate->id) selected @endif>
                                                        {{ $kpidirectorate->kpi_directorate }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="departement_id">Departement</label>
                                            <select class="form-control" id="departement_id" name="departement_id" required>
                                                <option value="" selected disabled>Select KPI Departement</option>
                                                @foreach ($departements as $departement)
                                                    <option value="{{ $departement->id }}"
                                                        @if ($kpiDepartement->departement_id == $departement->id) selected @endif>
                                                        {{ $departement->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="framework">Framework</label>
                                            <input type="text" class="form-control" id="framework" name="framework"
                                                value="{{ $kpiDepartement->framework }}" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="kpi_departement">KPI Departement</label>
                                            <input type="text" class="form-control" id="kpi_departement"
                                                name="kpi_departement" value="{{ $kpiDepartement->kpi_departement }}"
                                                required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="year">Year</label>
                                            <input type="number" class="form-control" id="year" name="year"
                                                value="{{ $kpiDepartement->year }}" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="start_date">Start Date</label>
                                            <input type="date" class="form-control" id="start_date" name="start_date"
                                                value="{{ $kpiDepartement->start_date }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="end_date">End Date</label>
                                            <input type="date" class="form-control" id="end_date" name="end_date"
                                                value="{{ $kpiDepartement->end_date }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="target_departement">Target Departement</label>
                                            <input type="text" class="form-control" id="target_departement"
                                                name="target_departement"
                                                value="{{ $kpiDepartement->target_departement }}">
                                        </div>
                                        <input type="number" name="updated" value="{{ Auth::user()->id }}" hidden>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="{{ route('kpidepartement.index') }}" class="btn btn-danger">Cancel</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
