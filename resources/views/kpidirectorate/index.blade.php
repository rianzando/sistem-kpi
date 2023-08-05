<!-- resources/views/kpi_departements/index.blade.php -->
@extends('layouts.main')
@section('title', 'KPI Directorates')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <h4 class="page-title">KPI Directorates</h4>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">KPI Directorates</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">KPI</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
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
                                {{ session('error') }} <i class="fas fa-times-circle"></i><button type="button"
                                    class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
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
                                <a href="{{ route('kpidirectorate.create') }}" class="btn btn-outline-success"><i
                                        class="fa fa-plus-circle"></i></a>
                                <div class="card">
                                    <div class="card-header">
                                        <form action="{{ route('kpidirectorate.index') }}" method="GET">
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
                                            <form action="{{ route('kpidirectorate.index') }}" method="GET">
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
                                            <th>Target Corporate</th>
                                            <th>Directorate</th>
                                            <th>KPI Departement</th>
                                            <th>Target</th>
                                            <th>Year</th>
                                            <th>Achievement</th>
                                            <th>Status</th>
                                            <th style="width: 15%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kpidirectorates as $kpidirectorate)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $kpidirectorate->kpicorporate->target_corporate }}</td>
                                                <td>{{ $kpidirectorate->directorate->name }}</td>
                                                <td>{{ $kpidirectorate->kpi_directorate }}</td>
                                                <td>{{ $kpidirectorate->target }}</td>
                                                <td>{{ $kpidirectorate->year }}</td>
                                                <td>{{ $kpidirectorate->achievement }}</td>
                                                <td>
                                                    @if ($kpidirectorate->status == 'On Progress')
                                                        <span class="badge badge-primary">On progress</span>
                                                    @elseif ($kpidirectorate->status == 'Open')
                                                        <span class="badge badge-warning">Open</span>
                                                    @else
                                                        <span class="badge badge-success">Done</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('kpidirectorate.show', $kpidirectorate->id) }}"
                                                        class="btn btn-sm btn-primary" data-toggle="tooltip"
                                                        data-placement="top" title="Show"><i class="fa fa-eye"></i></a>
                                                    <a href="{{ route('kpidirectorate.edit', $kpidirectorate->id) }}"
                                                        class="btn btn-sm btn-warning" data-toggle="tooltip"
                                                        data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                                    <form class="d-inline" method="post"
                                                        action="{{ route('kpidirectorate.destroy', $kpidirectorate->id) }}"
                                                        data-user="{{ $kpidirectorate->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-sm btn-danger delete-btn"
                                                            data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $kpidirectorates->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Function to show the SweetAlert confirmation dialog
        function showDeleteConfirmation(form) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'You are about to delete this KPI Directorate data. This action cannot be undone!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If the user clicks 'Yes', submit the form
                    form.submit();
                }
            });
        }

        // Add an event listener to the delete buttons
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.delete-btn');
            deleteButtons.forEach((button) => {
                button.addEventListener('click', function() {
                    const form = this.closest('form');
                    showDeleteConfirmation(form);
                });
            });
        });
    </script>
@endsection
