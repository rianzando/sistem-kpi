@extends('layouts.main')
@section('title', 'Create User')
@section('content')
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Form Add</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="{{ route('users.index') }}">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">User</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Add User</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add New User</h4>
                            <a href="{{ route('users.index') }}" class="btn btn-sm btn-default float-right">Back</a>
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
                                    {{ session('error') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                        </div>
                        <div class="card-body">

                            <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 col-lg-12">
                                        {{-- name  --}}
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Enter Fullname" required>
                                        </div>
                                        {{-- name  --}}
                                        <div class="form-group">
                                            <label for="email">Email Address</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="Enter Email" required>
                                            <small class="form-text text-muted">We'll never share your email with anyone
                                                else.</small>
                                        </div>
                                        {{-- password  --}}
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" name="password"
                                                placeholder="Password" required>
                                        </div>
                                        {{-- roles  --}}
                                        <div class="form-group form-floating-label">
                                            <label for="role_id">Select Role</label>
                                            <select class="form-control input-border-bottom" name="role_id" id="role_id"
                                                required>
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-lg-12">
                                        {{-- nik  --}}
                                        <div class="form-group form-floating-label">
                                            <label for="nik">Input Nik</label>
                                            <input id="nik" type="text" class="form-control input-border-bottom"
                                                name="nik" required>
                                        </div>
                                        {{-- dimisili  --}}
                                        <div class="form-group form-floating-label">
                                            <label for="domisili">Select Domisili</label>
                                            <select class="form-control input-border-bottom" name="domisili" id="domisili"
                                                required>
                                                <option value="Lokal Kalbar">Lokal Kalbar</option>
                                                <option value="Non-lokal">Non-lokal</option>
                                            </select>
                                        </div>
                                        {{-- address  --}}
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <textarea class="form-control" id="address" rows="5" name="address"></textarea>
                                        </div>
                                        {{-- departement  --}}
                                        <div class="form-group form-floating-label">
                                            <label for="departement_id">Select Departement</label>
                                            <select class="form-control input-border-bottom" name="departement_id"
                                                id="departement_id" required>
                                                @foreach ($departements as $departement)
                                                    <option value="{{ $departement->id }}">{{ $departement->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group form-floating-label">
                                            <label for="position">Select Position</label>
                                            <select class="form-control input-border-bottom" name="position"
                                                id="position" required>
                                                <option value="Direktur">Direktur</option>
                                                <option value="Manager">Manager</option>
                                                <option value="Assitent Manager">Asst Manager</option>
                                                <option value="Supervisor">Supervisor</option>
                                                <option value="Staff">Staff</option>
                                            </select>
                                        </div>
                                        <div class="form-group form-floating-label">
                                            <label for="level">Select Level</label>
                                            <select class="form-control input-border-bottom" name="level"
                                                id="level" required>
                                                <option value="Spesialist">Spesialist</option>
                                                <option value="Senior">Senior</option>
                                                <option value="Junior">Junior</option>
                                            </select>
                                        </div>
                                        <div class="form-group form-floating-label">
                                            <label for="location">Select Location</label>
                                            <select class="form-control input-border-bottom" name="location"
                                                id="location" required>
                                                <option value="Bogor">Bogor</option>
                                                <option value="Ketapang">Ketapang</option>
                                            </select>
                                        </div>
                                        <div class="form-group form-floating-label">
                                            <label for="spk_status">Status SPK</label>
                                            <select class="form-control input-border-bottom" name="spk_status"
                                                id="spk_status" required>
                                                <option value="Permanent">Permanent</option>
                                                <option value="Kontrak">Kontrak</option>
                                                <option value="PHL">Pekerja Harian Lepas</option>
                                            </select>
                                        </div>
                                        <div class="form-group form-floating-label">
                                            <label for="first_work_date">First Work Date</label>
                                            <input id="first_work_date" type="date"
                                                class="form-control input-border-bottom" name="first_work_date">
                                        </div>
                                        <div class="form-group form-floating-label">
                                            <label for="end_work_date">End Work Date</label>
                                            <input id="end_work_date" type="date"
                                                class="form-control input-border-bottom" name="end_work_date">
                                        </div>
                                        <div class="form-group form-floating-label">
                                            <label for="place_of_birth">Place of Birth</label>
                                            <input id="place_of_birth" type="text"
                                                class="form-control input-border-bottom" name="place_of_birth">
                                        </div>
                                        <div class="form-group form-floating-label">
                                            <label for="date_of_birth">Date of Birth</label>
                                            <input id="date_of_birth" type="date"
                                                class="form-control input-border-bottom" name="date_of_birth">
                                        </div>
                                        <div class="form-check">
                                            <label>Gender</label><br />
                                            <label class="form-radio-label">
                                                <input class="form-radio-input" type="radio" name="optionsRadios"
                                                    value="laki-laki" checked>
                                                <span class="form-radio-sign">Laki - laki</span>
                                            </label>
                                            <label class="form-radio-label ml-3">
                                                <input class="form-radio-input" type="radio" name="optionsRadios"
                                                    value="perempuan">
                                                <span class="form-radio-sign">Perempuan</span>
                                            </label>
                                        </div>
                                        <div class="form-group form-floating-label">
                                            <label for="education">Education</label>
                                            <input id="education" type="text" class="form-control input-border-bottom"
                                                name="education" required>
                                        </div>
                                        <div class="form-group form-floating-label">
                                            <label for="name_of_place">Name of Place Education</label>
                                            <input id="name_of_place" type="text"
                                                class="form-control input-border-bottom" name="name_of_place" required>
                                        </div>
                                        <div class="form-group form-floating-label">
                                            <label for="major">Major</label>
                                            <input id="major" type="text" class="form-control input-border-bottom"
                                                name="major" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="image">Image</label>
                                            <input type="file" class="form-control-file" id="image"
                                                name="image">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-action">
                                    <button type="submit" class="btn btn-sm btn-success">Submit</button>
                                    <a href="{{ route('users.index') }}" class="btn btn-sm btn-danger">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
