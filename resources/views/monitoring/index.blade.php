<!-- resources/views/kpi_departements/index.blade.php -->
@extends('layouts.main')
@section('title', 'KPI Monitoring')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <h4 class="page-title">KPI Monitoring</h4>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">KPI Monitoring</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Monitoring</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('monitoring.create') }}" class="btn btn-sm btn-success"><i
                                    class="fa fa-plus-circle"> Add</i></a>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-responsive-sm">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Current Progress</th>
                                            <th>Follow Up</th>
                                            <th>Achievement</th>
                                            <th>Status</th>
                                            <th style="width:15%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($monitorings as $index => $monitoring)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $monitoring->start_date }}</td>
                                                <td>{{ $monitoring->end_date }}</td>
                                                <td>{{ $monitoring->current_progress }}</td>
                                                <td>{{ $monitoring->follow_up }}</td>
                                                <td>{{ $monitoring->achievement }}</td>
                                                <td>{{ $monitoring->status }}</td>
                                                <td>
                                                    <a href="#" class="btn btn-primary">Edit</a>
                                                    <form action="#" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"
                                                            onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add a click event listener to the delete button
            const deleteButton = document.querySelector('.delete-btn');
            deleteButton.addEventListener('click', function(e) {
                e.preventDefault();
                const form = document.getElementById('deleteForm');

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
                        form.submit();
                    }
                });
            });
        });
    </script>
@endsection
