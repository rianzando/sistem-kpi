@extends('layouts.main')
@section('title', 'Directorates List')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-12 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Directorates List List</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Directorates</a></li>
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
                            <h4 class="card-title">List Data Directorates List</h4>
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
                                <a href="#" class="btn btn-outline-success" data-toggle="modal"
                                    data-target="#addDirectorateModal">
                                    <i class="fa fa-plus-circle"></i>
                                </a>
                                <div class="card">
                                    <div class="card-header">
                                        <form action="{{ route('departements.index') }}" method="GET">
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
                                            <form action="{{ route('departements.index') }}" method="GET">
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
                                <table class="table table-striped table-responsive-sm">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Directorate</th>
                                            <th>Departement</th>
                                            <th style="width: 15%"></th>
                                        </tr>
                                    </thead>
                                    @forelse ($departements as $departement)
                                        <tbody>
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $departement->directorate->name }}</td>
                                                <td>{{ $departement->name }}</td>
                                                <td>
                                                    <a href="{{ route('departements.edit', $departement->id) }}"
                                                        class="btn btn-sm btn-warning" data-toggle="tooltip"
                                                        data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                                    <button class="btn btn-sm btn-primary btn-show" data-toggle="modal"
                                                        data-target="#detailModal"
                                                        data-departement-name="{{ $departement->name }}"
                                                        data-directorate-name="{{ $departement->directorate->name }}"
                                                        data-toggle="tooltip" data-placement="top" title="show">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                    <form class="d-inline" method="post"
                                                        action="{{ route('departements.destroy', $departement->id) }}"
                                                        data-user="{{ $departement->id }}">
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
                                                <td colspan="10" class="text-center">Data departements Masih Kosong</td>
                                            </tr>
                                        </tfoot>
                                    @endforelse
                                </table>
                                {{ $departements->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Show-->
    <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailModalLabel">Directorate Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><strong>Directorate:</strong> <span id="modal-directorate-name"></span></p>
                    <!-- Add other fields as needed -->
                    <p><strong>Departement:</strong> <span id="modal-departement-name"></span></p>
                    <!-- Add other fields as needed -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Wait for the DOM to be ready
        document.addEventListener("DOMContentLoaded", function() {
            // Get all elements with class 'btn-show'
            var showButtons = document.querySelectorAll('.btn-show');

            // Attach click event listener to each button
            showButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    // Get the 'data-departement-name' and 'data-directorate-name' attribute values from the button
                    var departementName = button.getAttribute('data-departement-name');
                    var directorateName = button.getAttribute('data-directorate-name');

                    // Update the modal with the data
                    document.getElementById('modal-departement-name').textContent = departementName;
                    document.getElementById('modal-directorate-name').textContent = directorateName;
                });
            });
        });
    </script>


    <script>
        // Function to show the SweetAlert confirmation dialog
        function showDeleteConfirmation(form) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'You are about to delete this Departement data. This action cannot be undone!',
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



    {{-- modal add departement  --}}
    <div class="modal fade" id="addDirectorateModal" tabindex="-1" role="dialog"
        aria-labelledby="addDirectorateModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDirectorateModalLabel">Add New Departement</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Add form fields here to collect data for the new Directorate -->
                    <form id="addDirectorateForm" method="POST" action="{{ route('departements.store') }}">
                        @csrf
                        <div class="form-group form-floating-label">
                            <label for="directorate_id">Select Directorate</label>
                            <select class="form-control input-border-bottom" name="directorate_id" id="directorate_id"
                                required>
                                @foreach ($directorates as $directorate)
                                    <option value="{{ $directorate->id }}">{{ $directorate->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Departement Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="addDirectorate()">Add</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function addDirectorate() {
            // Submit the form when the "Add" button is clicked
            document.getElementById('addDirectorateForm').submit();
        }
    </script>
@endsection
