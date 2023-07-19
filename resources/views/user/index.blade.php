@extends('layouts.main')
@section('title', 'List Users')
@section('content')
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Users</h2>
                        {{-- <h5 class="text-white op-7 mb-2">Free Bootstrap 4 Admin Dashboard</h5> --}}

                    </div>
                    <div class="ml-md-auto py-2 py-md-0">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Users</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Users List</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-light">
                            <h4 class="card-title">List User Sistem KPI</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <a href="{{ route('users.create') }}" class="btn btn-sm btn-success"><i
                                        class="fa fa-plus-circle"> Add
                                        User</i></a>
                                <table class="table table-bordered table-head-bg-info table-bordered-bd-info mt-4">
                                    <thead>
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
                                            <th style="width: 15%">Action</th>
                                        </tr>
                                    </thead>
                                    @forelse ($users as $user)
                                        <tbody>
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->detail->departement->directorate->name }}</td>
                                                <td>{{ $user->detail->departement->name }}</td>
                                                <td>{{ $user->detail->position }}</td>
                                                <td>{{ $user->detail->level }}</td>
                                                <td>{{ $user->detail->gender }}</td>
                                                <td>{{ $user->detail->spk_status }}</td>
                                                <td>
                                                    <a href="" class="btn btn-sm btn-warning"><i
                                                            class="fa fa-edit"></i></a>
                                                    <a href="" class="btn btn-sm btn-primary"><i
                                                            class="fa fa-eye"></i></a>
                                                    <a href="" class="btn btn-sm btn-danger"><i
                                                            class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    @empty
                                        <tfoot>
                                            <tr>
                                                <td>Data User Masih Kosong</td>
                                            </tr>
                                        </tfoot>
                                    @endforelse
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
