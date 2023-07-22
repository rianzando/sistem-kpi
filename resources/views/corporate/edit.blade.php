@extends('layouts.main')
@section('title', 'Edit KPI Corporate')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-12 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('corporates.index') }}">KPI Corporate List</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit KPI Corporate</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-xl-12 col-xxl-12">
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }} <i class="fas fa-check-circle"></i><button type="button"
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
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit KPI Corporate</h4>
                            <a href="{{ route('corporates.index') }}" class="btn btn-sm btn-primary float-right">Back</a>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('corporates.update', $corporate->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="goals">Goals</label>
                                    <input type="text" class="form-control" id="goals" name="goals"
                                        value="{{ old('goals', $corporate->goals) }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="kpi_corporate">KPI Corporate</label>
                                    <input type="text" class="form-control" id="kpi_corporate" name="kpi_corporate"
                                        value="{{ old('kpi_corporate', $corporate->kpi_corporate) }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="target_corporate">Target Corporate</label>
                                    <input type="text" class="form-control" id="target_corporate" name="target_corporate"
                                        value="{{ old('target_corporate', $corporate->target_corporate) }}">
                                </div>
                                <div class="form-group">
                                    <label for="bobot">Bobot</label>
                                    <input type="text" class="form-control" id="bobot" name="bobot"
                                        value="{{ old('bobot', $corporate->bobot) }}" required>
                                </div>
                                {{-- year --}}
                                <div class="form-group form-floating-label">
                                    <label for="year">Year</label>
                                    <select id="year" class="form-control input-border-bottom" name="year" required>
                                        @php
                                            $currentYear = date('Y');
                                            $startYear = 1900;
                                            $endYear = $currentYear + 50;
                                        @endphp
                                        @for ($year = $endYear; $year >= $startYear; $year--)
                                            <option value="{{ $year }}"
                                                {{ $year == old('year', $corporate->year) ? 'selected' : '' }}>
                                                {{ $year }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="achievement">Achievement</label>
                                    <input type="number" class="form-control" id="achievement" name="achievement"
                                        value="{{ old('achievement', $corporate->achievement) }}" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
