@extends('layouts.main')
@section('title', 'Edit Directorate')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-12 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('directorates.index') }}">Directorate List</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Directorate</a></li>
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
                            <a href="{{ route('directorates.index') }}" class="btn btn-sm btn-primary float-right">Back</a>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('directorates.update', $directorate->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="name">Directorate Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ old('name', $directorate->name) }}" required>
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
