@extends('layouts.main')
@section('title', 'List Users')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-12 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">User List</a></li>
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
                            <h4 class="card-title">List Data User</h4>
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="table-responsive">
                                <a href="{{ route('users.create') }}" class="btn btn-sm btn-success"><i
                                        class="fa fa-plus-circle"> Add
                                        User</i></a>
                                <div class="card">
                                    <div class="card-header">
                                        <form action="{{ route('users.index') }}" method="GET">
                                            <label for="perPage">Show:</label>
                                            <select name="perPage" id="perPage" onchange="this.form.submit()">
                                                @foreach ($entries as $entry)
                                                    <option value="{{ $entry }}"
                                                        {{ $perPage == $entry ? 'selected' : '' }}>
                                                        {{ $entry }}</option>
                                                @endforeach
                                            </select>
                                        </form>
                                        <div class="card-tools">
                                            <form action="{{ route('users.index') }}" method="GET">
                                                <div class="input-group input-group-sm" style="width: 150px;">
                                                    <input type="text" name="search" value="{{ $search }}"
                                                        class="form-control float-right" placeholder="Search">
                                                    <div class="input-group-append">
                                                        <button type="submit" class="btn btn-default">
                                                            <i class="fas fa-search"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <table class="table table-bordered table-hover table-responsive-sm text-dark">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Direktorat</th>
                                            <th>Departemen</th>
                                            <th>Position</th>
                                            <th>Level</th>
                                            <th>Gender</th>
                                            <th>Status SPK</th>
                                            <th>Status</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                            <th style="width: 15%"></th>
                                        </tr>
                                    </thead>
                                    @forelse ($users as $user)
                                        <tbody>
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->userdetail->departement->name ?? 'Departement Tidak Tersedia' }}
                                                </td>
                                                <td>{{ $user->userdetail->departement->name ?? 'Departement Tidak Tersedia' }}
                                                </td>
                                                <td>{{ $user->userdetail->position }}</td>
                                                <td>{{ $user->userdetail->level }}</td>
                                                <td>{{ $user->userdetail->gender }}</td>
                                                <td>{{ $user->userdetail->spk_status }}</td>
                                                <td>
                                                    @if ($user->status === 'active')
                                                        <span
                                                            class="badge badge-rounded badge-outline-success">Active</span>
                                                    @elseif ($user->status === 'inactive')
                                                        <span
                                                            class="badge badge-rounded badge-outline-danger">Inactive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($user->userdetail->image)
                                                        <img src="{{ asset('storage/' . $user->userdetail->image) }}"
                                                            alt="User Image" width="100">
                                                    @else
                                                        No Image
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if ($user->status === 'active')
                                                        <form class="d-line"
                                                            action="{{ route('users.updateStatus', $user->id) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit" class="btn btn-sm btn-danger"
                                                                data-toggle="tooltip" data-placement="top" title="inactive">
                                                                <i class="fa fa-times-circle"></i></button>
                                                        </form>
                                                    @elseif ($user->status === 'inactive')
                                                        <form class="d-line"
                                                            action="{{ route('users.updateStatus', $user->id) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit" class="btn btn-sm btn-success"
                                                                data-toggle="tooltip" data-placement="top" title="active">
                                                                <i class="fa fa-check-circle"></i></button>
                                                        </form>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('users.edit', $user->id) }}"
                                                        class="btn btn-sm btn-warning" data-toggle="tooltip"
                                                        data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                                    <a href="{{ route('users.show', $user->id) }}"
                                                        class="btn btn-sm btn-primary" data-toggle="tooltip"
                                                        data-placement="top" title="Show"><i class="fa fa-eye"></i></a>
                                                    <form class="d-inline" method="post"
                                                        action="{{ route('users.destroy', $user->id) }}"
                                                        data-user="{{ $user->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-sm btn-danger delete-btn"
                                                            data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        </tbody>
                                    @empty
                                        <tfoot>
                                            <tr>
                                                <td colspan="10" class="text-center">Data User Masih Kosong</td>
                                            </tr>
                                        </tfoot>
                                    @endforelse
                                </table>
                                {{ $users->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add the following script at the bottom of the view -->
    <script>
        // Add a click event listener to the delete buttons
        document.querySelectorAll('.delete-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const userId = this.parentElement.dataset
                    .user; // Get the user ID from the parent form element

                // Show SweetAlert confirmation dialog
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                }).then((result) => {
                    // If user clicks "Yes", submit the form for deletion
                    if (result.isConfirmed) {
                        document.querySelector(`form[data-user="${userId}"]`).submit();
                    }
                });
            });
        });
    </script>
@endsection
