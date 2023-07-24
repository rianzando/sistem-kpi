@extends('layouts.main')
@section('title', 'Edit Departement')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-12 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('departements.index') }}">Departement List</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Departement</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-xl-12 col-xxl-12">
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <i class="fas fa-check-circle"></i>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
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
                            <h4 class="card-title">Edit Directorate</h4>
                            <a href="{{ route('departements.index') }}" class="btn btn-sm btn-primary float-right">Back</a>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('departements.update', $departement->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="name">Departement</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ old('name', $departement->name) }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="directorate_id">Select Directorate</label>
                                    <select class="form-control" id="directorate_id" name="directorate_id" required>
                                        @foreach ($directorates as $directorate)
                                            <option value="{{ $directorate->id }}"
                                                {{ $directorate->id === $departement->directorate_id ? 'selected' : '' }}>
                                                {{ $directorate->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Add other fields as needed -->
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
