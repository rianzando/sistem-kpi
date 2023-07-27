<!-- resources/views/kpi_departements/show.blade.php -->
@extends('layouts.main')
@section('title', 'Detail KPI Departement')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <h4 class="page-title">Detail KPI Departement</h4>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">KPI Departements</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('kpidepartement.index') }}">Show</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Detail</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="basic-form">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="kpi_directorate_id">KPI Directorate</label>
                                        <input type="text" class="form-control" id="kpi_directorate_id"
                                            name="kpi_directorate_id"
                                            value="{{ $kpidepartement->kpidirectorate->target ?? 'N/A' }}" disabled>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="departement_id">Departement</label>
                                        <input type="text" class="form-control" id="departement_id" name="departement_id"
                                            value="{{ $kpidepartement->departement->name }}" disabled>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="framework">Framework</label>
                                        <input type="text" class="form-control" id="framework" name="framework"
                                            value="{{ $kpidepartement->framework }}" disabled>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="kpi_departement">KPI Departement</label>
                                        <input type="text" class="form-control" id="kpi_departement"
                                            name="kpi_departement" value="{{ $kpidepartement->kpi_departement }}" disabled>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="year">Year</label>
                                        <input type="number" class="form-control" id="year" name="year"
                                            value="{{ $kpidepartement->year }}" disabled>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="start_date">Start Date</label>
                                        <input type="text" class="form-control" id="start_date" name="start_date"
                                            value="{{ $kpidepartement->start_date }}" disabled>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="end_date">End Date</label>
                                        <input type="text" class="form-control" id="end_date" name="end_date"
                                            value="{{ $kpidepartement->end_date }}" disabled>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="target_departement">Target Departement</label>
                                        <input type="text" class="form-control" id="target_departement"
                                            name="target_departement" value="{{ $kpidepartement->target_departement }}"
                                            disabled>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="achievement">Achievement</label>
                                        <input type="number" class="form-control" id="achievement" name="achievement"
                                            value="{{ $kpidepartement->achievement }}" disabled>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="status">Status</label>
                                        <input type="text" class="form-control" id="status" name="status"
                                            value="{{ $kpidepartement->status }}" disabled>
                                    </div>
                                </div>
                                <a href="{{ route('kpidepartement.index') }}" class="btn btn-primary">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
