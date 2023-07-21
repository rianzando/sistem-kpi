@extends('layouts.main')
@section('title', 'Profile User')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Hi, welcome!</h4>
                        <p class="mb-0">{{ $user->name }}</p>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Profile</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="profile">
                        <div class="profile-head">
                            <div class="photo-content">
                                <div class="cover-photo"></div>
                                <div class="profile-photo">
                                    <img src="{{ asset('storage/' . $user->userdetail->image) }}"
                                        class="img-fluid rounded-circle" alt="">
                                </div>
                            </div>
                            <div class="profile-info">
                                <div class="row justify-content-center">
                                    <div class="col-xl-8">
                                        <div class="row">
                                            <div class="col-xl-4 col-sm-4 border-right-1 prf-col">
                                                <div class="profile-name">
                                                    <h4 class="text-primary">{{ $user->name }}</h4>
                                                    <p>{{ $user->userdetail->departement->name }}</p>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-sm-4 border-right-1 prf-col">
                                                <div class="profile-email">
                                                    <h4 class="text-muted">{{ $user->email }}</h4>
                                                    <p>Email</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-1">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="profile-statistics">
                                <div class="text-center mt-4 border-bottom-1 pb-3">
                                    <div class="row">
                                        <div class="col">
                                            <div class="card-tit">{{ $user->name }}</div>
                                        </div>
                                        <div class="col">
                                            <div class="card-tit">{{ $user->role->name }}</div>
                                        </div>
                                    </div>
                                    {{-- <div class="mt-4"><a href="javascript:void()"
                                            class="btn btn-primary pl-5 pr-5 mr-3 mb-4">Follow</a> <a
                                            href="javascript:void()" class="btn btn-dark pl-5 pr-5 mb-4">Send
                                            Message</a>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="profile-tab">
                                <div class="custom-tab-1">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item"><a href="#about-me" data-toggle="tab"
                                                class="nav-link active show">About
                                                Me</a>
                                        </li>
                                        <li class="nav-item"><a href="#profile-settings" data-toggle="tab"
                                                class="nav-link">Setting</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="about-me" class="tab-pane fade active show">
                                            @if (session()->has('success'))
                                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    {{ session('success') }} <i class="fas fa-check-circle"></i><button
                                                        type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            @endif
                                            @if (session()->has('error'))
                                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    {{ session('error') }} <i class="fas fa-times-circle"></i><button
                                                        type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            @endif
                                            <div class="profile-personal-info pt-5 ">
                                                <h4 class="text-primary mb-4">Personal Information</h4>
                                                <div class="row mb-4">
                                                    <div class="col-3">
                                                        <h5 class="f-w-500">Name <span class="pull-right">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-9"><span>{{ $user->name }}</span>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col-3">
                                                        <h5 class="f-w-500">Nik <span class="pull-right">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-9"><span>{{ $user->userdetail->nik }}</span>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col-3">
                                                        <h5 class="f-w-500">Email <span class="pull-right">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-9"><span>{{ $user->email }}</span>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col-3">
                                                        <h5 class="f-w-500">Phone <span class="pull-right">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-9"><span>{{ $user->userdetail->phone }}</span>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col-3">
                                                        <h5 class="f-w-500">Address <span class="pull-right">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-9"><span>{{ $user->userdetail->address }}</span>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col-3">
                                                        <h5 class="f-w-500">Date of birth <span
                                                                class="pull-right">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-9">
                                                        <span>{{ $user->userdetail->date_of_birth }}</span>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col-3">
                                                        <h5 class="f-w-500">Place of birth <span
                                                                class="pull-right">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-9">
                                                        <span>{{ $user->userdetail->place_of_birth }}</span>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col-3">
                                                        <h5 class="f-w-500">Age <span class="pull-right">:</span></h5>
                                                    </div>
                                                    <div class="col-9">
                                                        <span>
                                                            @if ($user->userdetail && $user->userdetail->date_of_birth)
                                                                @php
                                                                    // Get the date of birth from the user details
                                                                    $dob = $user->userdetail->date_of_birth;
                                                                    // Calculate the age using Carbon
                                                                    $age = \Carbon\Carbon::parse($dob)
                                                                        ->diff(\Carbon\Carbon::now())
                                                                        ->format('%y');
                                                                @endphp
                                                                ({{ $age }} years old)
                                                            @else
                                                                No date of birth available.
                                                            @endif
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="profile-personal-info pt-5 ">
                                                    <h4 class="text-primary mb-4">Work Information</h4>
                                                    <div class="row mb-4">
                                                        <div class="col-3">
                                                            <h5 class="f-w-500">Place Of Work <span
                                                                    class="pull-right">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-9"><span>{{ $user->userdetail->location }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <div class="col-3">
                                                            <h5 class="f-w-500">Directorate <span
                                                                    class="pull-right">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-9">
                                                            <span>{{ $user->userdetail->departement->directorate->name }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <div class="col-3">
                                                            <h5 class="f-w-500">Departement <span
                                                                    class="pull-right">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-9">
                                                            <span>{{ $user->userdetail->departement->name }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <div class="col-3">
                                                            <h5 class="f-w-500">Position <span class="pull-right">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-9">
                                                            <span>{{ $user->userdetail->position }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <div class="col-3">
                                                            <h5 class="f-w-500">Level <span class="pull-right">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-9">
                                                            <span>{{ $user->userdetail->level }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <div class="col-3">
                                                            <h5 class="f-w-500">Status<span class="pull-right">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-9">
                                                            <span>{{ $user->userdetail->spk_status }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <div class="col-3">
                                                            <h5 class="f-w-500">Year Experience <span
                                                                    class="pull-right">:</span></h5>
                                                        </div>
                                                        <div class="col-9">
                                                            <span>
                                                                @if ($user->userdetail && $user->userdetail->first_work_date)
                                                                    @php
                                                                        // Get the date of the first work from the user details
                                                                        $firstWorkDate = $user->userdetail->first_work_date;
                                                                        // Calculate the work experience using Carbon
                                                                        $workExperience = \Carbon\Carbon::parse($firstWorkDate)
                                                                            ->diff(\Carbon\Carbon::now())
                                                                            ->format('%y years, %m months, %d days');
                                                                    @endphp
                                                                    ({{ $workExperience }})
                                                                @else
                                                                    No date available.
                                                                @endif
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="profile-personal-info pt-5 ">
                                                    <h4 class="text-primary mb-4">Education Information</h4>
                                                    <div class="row mb-4">
                                                        <div class="col-3">
                                                            <h5 class="f-w-500">Education <span
                                                                    class="pull-right">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-9">
                                                            <span>{{ $user->userdetail->education }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <div class="col-3">
                                                            <h5 class="f-w-500">Name Of Place Education <span
                                                                    class="pull-right">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-9">
                                                            <span>{{ $user->userdetail->name_of_place }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <div class="col-3">
                                                            <h5 class="f-w-500">Major <span class="pull-right">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-9">
                                                            <span>{{ $user->userdetail->major }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="profile-settings" class="tab-pane fade">
                                            <div class="pt-3">
                                                <div class="settings-form">
                                                    <h4 class="text-primary">Account Setting</h4>
                                                    <form action="{{ route('users.updateprofile', $user->id) }}"
                                                        method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="user_id"
                                                            value="{{ $user->id }}">

                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label>Name</label>
                                                                <input type="text" class="form-control" name="name"
                                                                    value="{{ $user->name }}">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Email</label>
                                                                <input type="email" class="form-control" name="email"
                                                                    value="{{ $user->email }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Password</label>
                                                            <input type="password" class="form-control" name="password">
                                                            <small class="form-text text-muted">Leave blank if you don't
                                                                want to change the password.</small>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label>Nik</label>
                                                                <input type="text" class="form-control" name="nik"
                                                                    value="{{ $user->userdetail->nik }}">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Select Domisili</label>
                                                                <select class="form-control input-border-bottom"
                                                                    name="domisili" id="domisili" required>
                                                                    <option value="Lokal Kalbar"
                                                                        {{ old('domisili', $user->userdetail->domisili) == 'Lokal Kalbar' ? 'selected' : '' }}>
                                                                        Lokal Kalbar</option>
                                                                    <option value="Non-lokal"
                                                                        {{ old('domisili', $user->userdetail->domisili) == 'Non-lokal' ? 'selected' : '' }}>
                                                                        Non-lokal</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label>Phone</label>
                                                                <input type="text" class="form-control" name="phone"
                                                                    value="{{ $user->userdetail->phone }}">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Address</label>
                                                                <input type="text" class="form-control" name="address"
                                                                    value="{{ $user->userdetail->address }}">
                                                            </div>
                                                        </div>

                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label>Place of Birth</label>
                                                                <input id="place_of_birth" type="text"
                                                                    class="form-control input-border-bottom"
                                                                    name="place_of_birth"
                                                                    value="{{ old('place_of_birth', $user->userdetail->place_of_birth) }}">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="date_of_birth">Date of Birth</label>
                                                                <input id="date_of_birth" type="date"
                                                                    class="form-control input-border-bottom"
                                                                    name="date_of_birth"
                                                                    value="{{ old('date_of_birth', date('Y-m-d', strtotime($user->userdetail->date_of_birth))) }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-4">
                                                                <label>Education</label>
                                                                <input type="text" class="form-control"
                                                                    name="education"
                                                                    value="{{ $user->userdetail->education }}">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label>Name Of Place Education</label>
                                                                <input type="text" class="form-control"
                                                                    name="name_of_place"
                                                                    value="{{ $user->userdetail->name_of_place }}">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label>Major</label>
                                                                <input type="text" class="form-control" name="major"
                                                                    value="{{ $user->userdetail->major }}">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="image">Image</label>
                                                                <input type="file" class="form-control-file"
                                                                    id="image" name="image">
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Current Image</label><br>
                                                                <img src="{{ asset('storage/' . $user->userdetail->image) }}"
                                                                    alt="Current Image" width="200">
                                                            </div>
                                                        </div>
                                                        <button class="btn btn-primary" type="submit">Update</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
