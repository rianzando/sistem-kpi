@extends('layouts.main')
@section('title', 'Create User')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-12 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">User Create</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">User</a></li>
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
                            <h4 class="card-title">Create User</h4>
                            <a href="{{ route('users.index') }}" class="btn btn-sm btn-primary float-right">Back</a>
                            @if (session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }} <i class="fas fa-check-circle"></i>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
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
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add New User</h4>
                                <a href="{{ route('users.index') }}" class="btn btn-sm btn-default float-right">Back</a>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
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
                                                <select class="form-control input-border-bottom" name="role_id"
                                                    id="role_id" required>
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
                                                <input id="nik" type="number"
                                                    class="form-control input-border-bottom" name="nik" required>
                                            </div>
                                            {{-- dimisili  --}}
                                            <div class="form-group form-floating-label">
                                                <label for="domisili">Select Domisili</label>
                                                <select class="form-control input-border-bottom" name="domisili"
                                                    id="domisili" required>
                                                    <option value="Lokal Kalbar">Lokal Kalbar</option>
                                                    <option value="Non-lokal">Non-lokal</option>
                                                </select>
                                            </div>
                                            {{-- address  --}}
                                            <div class="form-group">
                                                <label for="address">Address</label>
                                                <textarea class="form-control" id="address" rows="5" name="address"></textarea>
                                            </div>
                                            {{-- phone  --}}
                                            <div class="form-group">
                                                <label for="phone">Phone</label>
                                                <input id="phone" type="number"
                                                    class="form-control input-border-bottom" name="phone" required>
                                            </div>
                                            {{-- directorates  --}}
                                            <div class="form-group form-floating-label">
                                                <label for="directorate_id">Select Directorates</label>
                                                <select class="form-control input-border-bottom" name="directorate_id"
                                                    id="directorate_id" required>
                                                    @foreach ($directorates as $directorate)
                                                        <option value="{{ $directorate->id }}">{{ $directorate->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            {{-- departement  --}}
                                            <div class="form-group">
                                                <label for="departement_id">Departments</label><br>
                                                @foreach ($departements as $departement)
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="departement_id[]" value="{{ $departement->id }}"
                                                            id="departement{{ $departement->id }}">
                                                        <label class="form-check-label"
                                                            for="departement{{ $departement->id }}">{{ $departement->name }}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                            {{-- position --}}
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
                                            {{-- level  --}}
                                            <div class="form-group form-floating-label">
                                                <label for="level">Select Level</label>
                                                <select class="form-control input-border-bottom" name="level"
                                                    id="level" required>
                                                    <option value="Spesialist">Spesialist</option>
                                                    <option value="Senior">Senior</option>
                                                    <option value="Junior">Junior</option>
                                                </select>
                                            </div>
                                            {{-- location  --}}
                                            <div class="form-group form-floating-label">
                                                <label for="location">Select Location</label>
                                                <select class="form-control input-border-bottom" name="location"
                                                    id="location" required>
                                                    <option value="Bogor">Bogor</option>
                                                    <option value="Ketapang">Ketapang</option>
                                                </select>
                                            </div>
                                            {{-- status spk  --}}
                                            <div class="form-group form-floating-label">
                                                <label for="spk_status">Status SPK</label>
                                                <select class="form-control input-border-bottom" name="spk_status"
                                                    id="spk_status" required>
                                                    <option value="Permanent">Permanent</option>
                                                    <option value="Kontrak">Kontrak</option>
                                                    <option value="PHL">Pekerja Harian Lepas</option>
                                                </select>
                                            </div>
                                            {{-- first work date  --}}
                                            <div class="form-group form-floating-label">
                                                <label for="first_work_date">First Work Date</label>
                                                <input id="first_work_date" type="date"
                                                    class="form-control input-border-bottom" name="first_work_date">
                                            </div>
                                            {{-- end work date  --}}
                                            <div class="form-group form-floating-label">
                                                <label for="end_work_date">End Work Date</label>
                                                <input id="end_work_date" type="date"
                                                    class="form-control input-border-bottom" name="end_work_date">
                                            </div>
                                            {{-- place of birth  --}}
                                            <div class="form-group form-floating-label">
                                                <label for="place_of_birth">Place of Birth</label>
                                                <input id="place_of_birth" type="text"
                                                    class="form-control input-border-bottom" name="place_of_birth">
                                            </div>
                                            {{-- date of birth  --}}
                                            <div class="form-group form-floating-label">
                                                <label for="date_of_birth">Date of Birth</label>
                                                <input id="date_of_birth" type="date"
                                                    class="form-control input-border-bottom" name="date_of_birth">
                                            </div>
                                            {{-- gender  --}}
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
                                            {{-- education  --}}
                                            <div class="form-group form-floating-label">
                                                <label for="education">Education</label>
                                                <input id="education" type="text"
                                                    class="form-control input-border-bottom" name="education" required>
                                            </div>
                                            {{-- place  --}}
                                            <div class="form-group form-floating-label">
                                                <label for="name_of_place">Name of Place Education</label>
                                                <input id="name_of_place" type="text"
                                                    class="form-control input-border-bottom" name="name_of_place"
                                                    required>
                                            </div>
                                            {{-- major  --}}
                                            <div class="form-group form-floating-label">
                                                <label for="major">Major</label>
                                                <input id="major" type="text"
                                                    class="form-control input-border-bottom" name="major" required>
                                            </div>
                                            {{-- image  --}}
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
    </div>
@endsection
