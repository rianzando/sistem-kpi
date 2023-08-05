<!-- resources/views/kpi_departements/create.blade.php -->
@extends('layouts.main')
@section('title', 'Create KPI Directorate')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <h4 class="page-title">Create KPI Directorate</h4>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">KPI Departements</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('kpidirectorate.index') }}">Index</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Create</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
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
                            {{-- {{ $errors }} --}}
                            <div class="basic-form">
                                <form action="{{ route('kpidirectorate.store') }}" method="POST">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="kpi_corporate_id">KPI Corporate</label>
                                            <select class="form-control" id="kpi_corporate_id" name="kpi_corporate_id"
                                                required>
                                                <option value="" selected disabled>Select Target KPI Corporate
                                                </option>
                                                @foreach ($kpicorporates as $kpicorporate)
                                                    <option value="{{ $kpicorporate->id }}">
                                                        {{ $kpicorporate->target_corporate }}</option>
                                                @endforeach
                                            </select>
                                            @error('kpi_corporate_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="directorate_id">Directorate</label>
                                            <select class="form-control" id="directorate_id" name="directorate_id" required>
                                                <option value="" selected disabled>Select Directorate</option>
                                                @foreach ($directorates as $directorate)
                                                    <option value="{{ $directorate->id }}">{{ $directorate->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('directorate_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label for="kpi_directorate">KPI Directorate</label>
                                            <textarea class="form-control" id="kpi_directorate" name="kpi_directorate" required></textarea>
                                            @error('kpi_directorate')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="target">Target</label>
                                            <textarea class="form-control" id="target" name="target" required></textarea>
                                            @error('target')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="description">Description</label>
                                            <textarea cols="3" class="form-control" id="description" name="description"></textarea>
                                            @error('description')
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
                                    </div>
                                    <button type="submit" class="btn btn-primary">Create</button>
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
