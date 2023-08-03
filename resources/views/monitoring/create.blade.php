<!-- resources/views/kpi_departements/create.blade.php -->
@extends('layouts.main')
@section('title', 'Create Monitoring Data')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <h4 class="page-title">Create Monitoring Data</h4>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">KPI Monitoring</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Create</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <div class="card-body">
                            <form action="{{ route('monitoring.store') }}" method="POST">
                                @csrf
                                <input type="number" name="kpi_departement_id" value="{{ $kpi_departement_id }}" hidden>

                                <div class="form-group">
                                    <label for="start_date">Start Date</label>
                                    <input type="date" name="start_date" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="end_date">End Date</label>
                                    <input type="date" name="end_date" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="current_progress">Current Progress</label>
                                    <textarea name="current_progress" class="form-control" cols="6" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="follow_up">Follow Up</label>
                                    <textarea name="follow_up" class="form-control" cols="6" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="achievement">Achievement</label>
                                    <input type="number" name="achievement" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="Open">Open</option>
                                        <option value="Poseponed">Poseponed</option>
                                        <option value="On Progress">On Progress</option>
                                        <option value="Done">Done</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('kpidepartement.index') }}" class="btn btn-danger">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
