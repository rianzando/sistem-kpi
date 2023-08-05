<!-- resources/views/kpi_departements/create.blade.php -->
@extends('layouts.main')
@section('title', 'Create KPI Departement')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <h4 class="page-title">Create KPI Departement</h4>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">KPI Departements</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('kpidepartement.index') }}">Index</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Create</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('kpidepartement.store') }}" method="POST">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="kpi_directorate_id">KPI Directorate</label>
                                            <select class="form-control" id="kpi_directorate_id" name="kpi_directorate_id"
                                                required>
                                                <option value="" selected disabled>Select KPI Directorate</option>
                                                @foreach ($kpidirectorates as $kpidirectorate)
                                                    <option value="{{ $kpidirectorate->id }}">
                                                        {{ $kpidirectorate->kpi_directorate }}</option>
                                                @endforeach
                                            </select>
                                            @error('kpi_directorate_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="departement_id">Departement</label>
                                            <select class="form-control" id="departement_id" name="departement_id" required>
                                                <option value="" selected disabled>Select KPI Departement</option>
                                                @foreach ($departements as $departement)
                                                    <option value="{{ $departement->id }}">{{ $departement->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('departement_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label for="framework">Framework</label>
                                            <textarea class="form-control" id="framework" name="framework" required></textarea>
                                            @error('framework')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="kpi_departement">KPI Departement</label>
                                            <textarea class="form-control" id="kpi_departement" name="kpi_departement" required></textarea>
                                            @error('kpi_departement')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="target_departement">Target Departement</label>
                                            <textarea cols="3" class="form-control" id="target_departement" name="target_departement"></textarea>
                                            @error('target_departement')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="year">Year</label>
                                            <select class="form-control" id="year" name="year" required>
                                                <option value="" selected disabled>Select Year</option>
                                                @php
                                                    $currentYear = date('Y');
                                                    $endYear = 2050;
                                                @endphp

                                                @for ($year = $currentYear; $year <= $endYear; $year++)
                                                    <option value="{{ $year }}">{{ $year }}</option>
                                                @endfor
                                            </select>
                                            @error('year')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="start_date">Start Date</label>
                                            <input type="date" class="form-control" id="start_date" name="start_date">
                                            @error('start_date')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="end_date">End Date</label>
                                            <input type="date" class="form-control" id="end_date" name="end_date">
                                            @error('end_date')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Create</button>
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
