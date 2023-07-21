@extends('layouts.main')
@section('title', 'Edit User')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-12 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">User Edit</a></li>
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
                            <h4 class="card-title">Edit User</h4>
                            <a href="{{ route('users.index') }}" class="btn btn-sm btn-primary float-right">Back</a>

                        </div>
                        <div class="card-body">
                            <form action="{{ route('users.update', $user->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-12 col-lg-12">
                                        {{-- name  --}}
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                value="{{ old('name', $user->name) }}" required>
                                        </div>
                                        {{-- email  --}}
                                        <div class="form-group">
                                            <label for="email">Email Address</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                value="{{ old('email', $user->email) }}" required>
                                            <small class="form-text text-muted">We'll never share your email with anyone
                                                else.</small>
                                        </div>
                                        {{-- role  --}}
                                        <div class="form-group form-floating-label">
                                            <label for="role_id">Select Role</label>
                                            <select class="form-control input-border-bottom" name="role_id" id="role_id"
                                                required>
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}"
                                                        {{ old('role_id', $user->role_id) == $role->id ? 'selected' : '' }}>
                                                        {{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        {{-- password  --}}
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" name="password">
                                            <small class="form-text text-muted">Leave blank if you don't want to change the
                                                password.</small>
                                        </div>
                                        {{-- nik  --}}
                                        <div class="form-group form-floating-label">
                                            <label for="nik">Input Nik</label>
                                            <input id="nik" type="text" class="form-control input-border-bottom"
                                                name="nik" value="{{ old('nik', $user->userdetail->nik) }}" required>
                                        </div>
                                        {{-- domisili  --}}
                                        <div class="form-group form-floating-label">
                                            <label for="domisili">Select Domisili</label>
                                            <select class="form-control input-border-bottom" name="domisili" id="domisili"
                                                required>
                                                <option value="Lokal Kalbar"
                                                    {{ old('domisili', $user->userdetail->domisili) == 'Lokal Kalbar' ? 'selected' : '' }}>
                                                    Lokal Kalbar</option>
                                                <option value="Non-lokal"
                                                    {{ old('domisili', $user->userdetail->domisili) == 'Non-lokal' ? 'selected' : '' }}>
                                                    Non-lokal</option>
                                            </select>
                                        </div>
                                        {{-- address  --}}
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <textarea class="form-control" id="address" rows="5" name="address">{{ old('address', $user->userdetail->address) }}</textarea>
                                        </div>
                                        {{-- phone  --}}
                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <textarea class="form-control" id="phone" rows="5" name="phone">{{ old('phone', $user->userdetail->phone) }}</textarea>
                                        </div>
                                        {{-- departement  --}}
                                        <div class="form-group form-floating-label">
                                            <label for="departement_id">Select Departement</label>
                                            <select class="form-control input-border-bottom" name="departement_id"
                                                id="departement_id" required>
                                                @foreach ($departements as $departement)
                                                    <option value="{{ $departement->id }}"
                                                        {{ old('departement_id', $user->userdetail->departement_id) == $departement->id ? 'selected' : '' }}>
                                                        {{ $departement->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        {{-- position  --}}
                                        <div class="form-group form-floating-label">
                                            <label for="position">Select Position</label>
                                            <select class="form-control input-border-bottom" name="position"
                                                id="position" required>
                                                <option value="Direktur"
                                                    {{ old('position', $user->userdetail->position) == 'Direktur' ? 'selected' : '' }}>
                                                    Direktur</option>
                                                <option value="Manager"
                                                    {{ old('position', $user->userdetail->position) == 'Manager' ? 'selected' : '' }}>
                                                    Manager</option>
                                                <option value="Assitent Manager"
                                                    {{ old('position', $user->userdetail->position) == 'Assitent Manager' ? 'selected' : '' }}>
                                                    Asst Manager</option>
                                                <option value="Supervisor"
                                                    {{ old('position', $user->userdetail->position) == 'Supervisor' ? 'selected' : '' }}>
                                                    Supervisor</option>
                                                <option value="Staff"
                                                    {{ old('position', $user->userdetail->position) == 'Staff' ? 'selected' : '' }}>
                                                    Staff</option>
                                            </select>
                                        </div>
                                        {{-- level  --}}
                                        <div class="form-group form-floating-label">
                                            <label for="level">Select Level</label>
                                            <select class="form-control input-border-bottom" name="level"
                                                id="level" required>
                                                <option value="Spesialist"
                                                    {{ old('level', $user->userdetail->level) == 'Spesialist' ? 'selected' : '' }}>
                                                    Spesialist</option>
                                                <option value="Senior"
                                                    {{ old('level', $user->userdetail->level) == 'Senior' ? 'selected' : '' }}>
                                                    Senior</option>
                                                <option value="Junior"
                                                    {{ old('level', $user->userdetail->level) == 'Junior' ? 'selected' : '' }}>
                                                    Junior</option>
                                            </select>
                                        </div>
                                        {{-- location  --}}
                                        <div class="form-group form-floating-label">
                                            <label for="location">Select Location</label>
                                            <select class="form-control input-border-bottom" name="location"
                                                id="location" required>
                                                <option value="Bogor"
                                                    {{ old('location', $user->userdetail->location) == 'Bogor' ? 'selected' : '' }}>
                                                    Bogor</option>
                                                <option value="Ketapang"
                                                    {{ old('location', $user->userdetail->location) == 'Ketapang' ? 'selected' : '' }}>
                                                    Ketapang</option>
                                            </select>
                                        </div>
                                        {{-- spk status  --}}
                                        <div class="form-group form-floating-label">
                                            <label for="spk_status">Status SPK</label>
                                            <select class="form-control input-border-bottom" name="spk_status"
                                                id="spk_status" required>
                                                <option value="Permanent"
                                                    {{ old('spk_status', $user->userdetail->spk_status) == 'Permanent' ? 'selected' : '' }}>
                                                    Permanent</option>
                                                <option value="Kontrak"
                                                    {{ old('spk_status', $user->userdetail->spk_status) == 'Kontrak' ? 'selected' : '' }}>
                                                    Kontrak</option>
                                                <option value="PHL"
                                                    {{ old('spk_status', $user->userdetail->spk_status) == 'PHL' ? 'selected' : '' }}>
                                                    Pekerja Harian Lepas</option>
                                            </select>
                                        </div>
                                        {{-- first work date  --}}
                                        <div class="form-group form-floating-label">
                                            <label for="first_work_date">First Work Date</label>
                                            <input id="first_work_date" type="date"
                                                class="form-control input-border-bottom" name="first_work_date"
                                                value="{{ old('first_work_date', date('Y-m-d', strtotime($user->userdetail->first_work_date))) }}">
                                        </div>
                                        {{-- end work date  --}}
                                        <div class="form-group form-floating-label">
                                            <label for="end_work_date">End Work Date</label>
                                            <input id="end_work_date" type="date"
                                                class="form-control input-border-bottom" name="end_work_date"
                                                value="{{ old('end_work_date', date('Y-m-d', strtotime($user->userdetail->end_work_date))) }}">
                                        </div>
                                        {{-- place of birth  --}}
                                        <div class="form-group form-floating-label">
                                            <label for="place_of_birth">Place of Birth</label>
                                            <input id="place_of_birth" type="text"
                                                class="form-control input-border-bottom" name="place_of_birth"
                                                value="{{ old('place_of_birth', $user->userdetail->place_of_birth) }}">
                                        </div>
                                        {{-- date of birth  --}}
                                        <div class="form-group form-floating-label">
                                            <label for="date_of_birth">Date of Birth</label>
                                            <input id="date_of_birth" type="date"
                                                class="form-control input-border-bottom" name="date_of_birth"
                                                value="{{ old('date_of_birth', date('Y-m-d', strtotime($user->userdetail->date_of_birth))) }}">
                                        </div>

                                        {{-- gender  --}}
                                        <div class="form-check">
                                            <label>Gender</label><br />
                                            <label class="form-radio-label">
                                                <input class="form-radio-input" type="radio" name="optionsRadios"
                                                    value="laki-laki"
                                                    {{ old('optionsRadios', $user->userdetail->gender) === 'laki-laki' ? 'checked' : '' }}>
                                                <span class="form-radio-sign">Laki - laki</span>
                                            </label>
                                            <label class="form-radio-label ml-3">
                                                <input class="form-radio-input" type="radio" name="optionsRadios"
                                                    value="perempuan"
                                                    {{ old('optionsRadios', $user->userdetail->gender) === 'perempuan' ? 'checked' : '' }}>
                                                <span class="form-radio-sign">Perempuan</span>
                                            </label>
                                        </div>
                                        {{-- education  --}}
                                        <div class="form-group form-floating-label">
                                            <label for="education">Education</label>
                                            <input id="education" type="text" class="form-control input-border-bottom"
                                                name="education"
                                                value="{{ old('education', $user->userdetail->education) }}" required>
                                        </div>
                                        {{-- name of place  --}}
                                        <div class="form-group form-floating-label">
                                            <label for="name_of_place">Name of Place Education</label>
                                            <input id="name_of_place" type="text"
                                                class="form-control input-border-bottom" name="name_of_place"
                                                value="{{ old('name_of_place', $user->userdetail->name_of_place) }}"
                                                required>
                                        </div>
                                        {{-- major  --}}
                                        <div class="form-group form-floating-label">
                                            <label for="major">Major</label>
                                            <input id="major" type="text" class="form-control input-border-bottom"
                                                name="major" value="{{ old('major', $user->userdetail->major) }}"
                                                required>
                                        </div>
                                        {{-- image  --}}
                                        <div class="form-group">
                                            <label for="image">Image</label>
                                            <input type="file" class="form-control-file" id="image"
                                                name="image">
                                        </div>

                                        <div class="form-group">
                                            <label>Current Image</label><br>
                                            <img src="{{ asset('storage/' . $user->userdetail->image) }}"
                                                alt="Current Image" width="200">
                                        </div>

                                    </div>
                                </div>
                                <div class="card-action">
                                    <button type="submit" class="btn btn-sm btn-success">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
