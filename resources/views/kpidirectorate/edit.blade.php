<!-- resources/views/kpi_departements/edit.blade.php -->
@extends('layouts.main')
@section('title', 'Edit KPI Directorate')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <h4 class="page-title">Edit KPI Directorate</h4>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">KPI Directorate</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('kpidirectorate.index') }}">Index</a></li>
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
                                <form action="{{ route('kpidirectorate.update', $kpidirectorate->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="kpi_corporate_id">KPI Corporate</label>
                                            <select class="form-control" id="kpi_corporate_id" name="kpi_corporate_id"
                                                required>
                                                <option value="" selected disabled>Select Target KPI Corporate
                                                </option>
                                                @foreach ($kpicorporates as $kpicorporate)
                                                    <option value="{{ $kpicorporate->id }}"
                                                        @if ($kpidirectorate->kpi_corporate_id == $kpicorporate->id) selected @endif>
                                                        {{ $kpicorporate->target_corporate }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="directorate_id">Directorate</label>
                                            <select class="form-control" id="directorate_id" name="directorate_id" required>
                                                <option value="" selected disabled>Select Corporate</option>
                                                @foreach ($directorates as $directorate)
                                                    <option value="{{ $directorate->id }}"
                                                        @if ($kpidirectorate->directorate_id == $directorate->id) selected @endif>
                                                        {{ $directorate->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="kpi_directorate">KPI Directorate</label>
                                            <textarea class="form-control" id="kpi_directorate" name="kpi_directorate" required>{{ $kpidirectorate->kpi_directorate }}</textarea>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="target">Target</label>
                                            <textarea class="form-control" id="target" name="target" required>{{ $kpidirectorate->target }}</textarea>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="description">Description</label>
                                            <textarea class="form-control" id="description" name="description">{{ $kpidirectorate->description }}</textarea>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="year">Year</label>
                                            <select id="year" class="form-control input-border-bottom" name="year"
                                                required>
                                                @php
                                                    $currentYear = date('Y');
                                                    $startYear = 1900;
                                                    $endYear = $currentYear + 50;
                                                @endphp
                                                @for ($year = $endYear; $year >= $startYear; $year--)
                                                    <option value="{{ $year }}"
                                                        {{ $year == old('year', $kpidirectorate->year) ? 'selected' : '' }}>
                                                        {{ $year }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <input type="number" name="updated" value="{{ Auth::user()->id }}" hidden>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="{{ route('kpidirectorate.index') }}" class="btn btn-danger">Cancel</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
