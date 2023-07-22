@extends('layouts.main')
@section('title', 'Create KPI Corporate')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-12 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Create KPI Corporate</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">KPI Corporate</a></li>
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
                    @if (session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }} <i class="fas fa-times-circle"></i><button type="button" class="close"
                                data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Create KPI Corporate</h4>
                            <a href="{{ route('users.index') }}" class="btn btn-sm btn-primary float-right">Back</a>

                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add New KPI Corporate</h4>
                                {{-- <a href="{{ route('corporates.index') }}"
                                    class="btn btn-sm btn-default float-right">Back</a> --}}
                            </div>
                            <div class="card-body">
                                <form action="{{ route('corporates.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12">
                                            {{-- Goals  --}}
                                            <div class="form-group">
                                                <label for="goals">Goals</label>
                                                <input type="text" class="form-control" id="goals" name="goals"
                                                    placeholder="Enter Goals" required>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-lg-12">
                                            {{-- KPI Corporate  --}}
                                            <div class="form-group form-floating-label">
                                                <label for="kpi_corporate">KPI Corporate</label>
                                                <input id="kpi_corporate" type="text"
                                                    class="form-control input-border-bottom" name="kpi_corporate" required>
                                            </div>


                                            {{-- Target Corporate  --}}
                                            <div class="form-group">
                                                <label for="target_corporate">Target Corporate</label>
                                                <textarea class="form-control" id="target_corporate" rows="5" name="target_corporate"></textarea>
                                            </div>

                                            {{-- Bobot  --}}
                                            <div class="form-group form-floating-label">
                                                <label for="bobot">Bobot</label>
                                                <input id="bobot" type="number"
                                                    class="form-control input-border-bottom" name="bobot" required>
                                            </div>

                                            {{-- year  --}}
                                            <div class="form-group form-floating-label">
                                                <label for="year">Year</label>
                                                <select id="year" class="form-control input-border-bottom"
                                                    name="year" required>
                                                    @php
                                                        $currentYear = date('Y');
                                                        $startYear = 1900;
                                                        $endYear = $currentYear + 50;
                                                    @endphp
                                                    @for ($year = $endYear; $year >= $startYear; $year--)
                                                        <option value="{{ $year }}"
                                                            {{ $year == $currentYear ? 'selected' : '' }}>
                                                            {{ $year }}</option>
                                                    @endfor
                                                </select>
                                            </div>

                                            {{-- achievement  --}}
                                            <div class="form-group form-floating-label">
                                                <label for="achievement">Achievement</label>
                                                <input id="achievement" type="number"
                                                    class="form-control input-border-bottom" name="achievement" required>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="card-action">
                                        <button type="submit" class="btn btn-sm btn-success">Submit</button>
                                        <a href="{{ route('corporates.index') }}" class="btn btn-sm btn-danger">Cancel</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
