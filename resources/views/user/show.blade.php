@extends('layouts.main')
@section('title', 'User Details')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-12 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
                        <li class="breadcrumb-item active">User Details</li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">User Details</h4>
                            <a href="{{ route('users.index', $user->id) }}"
                                class="btn btn-sm btn-primary float-right">Back</a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-lg-6">
                                    <p><strong>Name:</strong> {{ $user->name }}</p>
                                    <p><strong>Email:</strong> {{ $user->email }}</p>
                                    <p><strong>Role:</strong> {{ $user->role->name }}</p>
                                    <p><strong>Nik:</strong> {{ $user->userdetail->nik }}</p>
                                    <p><strong>Domisili:</strong> {{ $user->userdetail->domisili }}</p>
                                    <p><strong>Address:</strong> {{ $user->userdetail->address }}</p>
                                    <p><strong>Directorate:</strong> {{ $user->userdetail->directorate->name }}</p>
                                    <p><strong>Departement:</strong> {{ $user->userdetail->departement->name }}</p>
                                    <p><strong>Position:</strong> {{ $user->userdetail->position }}</p>
                                    <p><strong>Level:</strong> {{ $user->userdetail->level }}</p>
                                    <p><strong>Location:</strong> {{ $user->userdetail->location }}</p>
                                    <p><strong>Status SPK:</strong> {{ $user->userdetail->spk_status }}</p>
                                    <p><strong>First Work Date:</strong> {{ $user->userdetail->first_work_date }}</p>
                                    <p><strong>End Work Date:</strong> {{ $user->userdetail->end_work_date }}</p>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <p><strong>Place of Birth:</strong> {{ $user->userdetail->place_of_birth }}</p>
                                    <p><strong>Date of Birth:</strong> {{ $user->userdetail->date_of_birth }}</p>
                                    <p><strong>Gender:</strong> {{ $user->userdetail->gender }}</p>
                                    <p><strong>Education:</strong> {{ $user->userdetail->education }}</p>
                                    <p><strong>Name of Place Education:</strong> {{ $user->userdetail->name_of_place }}</p>
                                    <p><strong>Major:</strong> {{ $user->userdetail->major }}</p>
                                    <p><strong>Image:</strong></p>
                                    <img src="{{ asset('storage/' . $user->userdetail->image) }}" alt="User Image"
                                        width="200">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
