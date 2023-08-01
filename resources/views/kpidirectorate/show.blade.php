<!-- resources/views/kpi_departements/show.blade.php -->
@extends('layouts.main')
@section('title', 'Detail KPI Directorate')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <h4 class="page-title">Detail KPI Directorate</h4>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">KPI Directorate</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('kpidirectorate.index') }}">Show</a></li>
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
                                        <label for="kpi_corporate_id">KPI Directorate</label>
                                        <input type="text" class="form-control" id="kpi_corporate_id"
                                            name="kpi_corporate_id"
                                            value="{{ $kpidirectorate->kpicorporate->target_corporate }}" disabled>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="directorate_id">Departement</label>
                                        <input type="text" class="form-control" id="directorate_id" name="directorate_id"
                                            value="{{ $kpidirectorate->directorate->name }}" disabled>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="kpi_directorate">KPI Directorate</label>
                                        <input type="text" class="form-control" id="kpi_directorate"
                                            name="kpi_directorate" value="{{ $kpidirectorate->kpi_directorate }}" disabled>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="kpi_departement">Target</label>
                                        <input type="text" class="form-control" id="kpi_departement"
                                            name="kpi_departement" value="{{ $kpidirectorate->target }}" disabled>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="description">Description</label>
                                        <input type="text" class="form-control" id="description" name="description"
                                            value="{{ $kpidirectorate->description }}" disabled>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="year">Year</label>
                                        <input type="number" class="form-control" id="year" name="year"
                                            value="{{ $kpidirectorate->year }}" disabled>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="achievement">Achievement</label>
                                        <input type="number" class="form-control" id="achievement" name="achievement"
                                            value="{{ $kpidirectorate->achievement }}" disabled>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="status">Status</label>
                                        <input type="text" class="form-control" id="status" name="status"
                                            value="{{ $kpidirectorate->status }}" disabled>
                                    </div>
                                </div>
                                <a href="{{ route('kpidirectorate.index') }}" class="btn btn-primary">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
