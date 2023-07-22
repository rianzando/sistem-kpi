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
                            <form action="{{ route('directorates.index') }}" method="GET">
                                <div class="input-group mb-3">
                                    <input type="text" name="keyword" class="form-control" placeholder="Search"
                                        value="{{ $keyword }}">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="submit">Search</button>
                                    </div>
                                </div>
                            </form>
                            <div class="table-responsive">
                                <a href="#" class="btn btn-outline-success" data-toggle="modal"
                                    data-target="#addDirectorateModal">
                                    <i class="fa fa-plus-circle"></i>
                                </a>
                                <table class="table table-striped table-responsive-sm">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Directorate Name</th>
                                            <th style="width: 15%"></th>
                                        </tr>
                                    </thead>
                                    @forelse ($directorates as $directorate)
                                        <tbody>
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $directorate->name }}</td>
                                                <td>
                                                    <a href="{{ route('directorates.edit', $directorate->id) }}"
                                                        class="btn btn-sm btn-warning" data-toggle="tooltip"
                                                        data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                                    <button class="btn btn-sm btn-primary btn-show" data-toggle="modal"
                                                        data-target="#detailModal" data-name="{{ $directorate->name }}"
                                                        data-toggle="tooltip" data-placement="top" title="show">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                    <form class="d-inline" method="post"
                                                        action="{{ route('directorates.destroy', $directorate->id) }}"
                                                        data-user="{{ $directorate->id }}">
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
                                                <td colspan="10" class="text-center">Data Directorates Masih Kosong</td>
                                            </tr>
                                        </tfoot>
                                    @endforelse
                                </table>
                                {{ $directorates->appends(['keyword' => $keyword])->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
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
                    <p><strong>Name:</strong> <span id="modal-name"></span></p>
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
                    // Get the 'data-name' attribute value from the button
                    var name = button.getAttribute('data-name');

                    // Update the modal with the data
                    document.getElementById('modal-name').textContent = name;
                });
            });
        });
    </script>



    <script>
        // Function to show the SweetAlert confirmation dialog
        function showDeleteConfirmation(form) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'You are about to delete this Directorate data. This action cannot be undone!',
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



    {{-- modal add directorates  --}}
    <div class="modal fade" id="addDirectorateModal" tabindex="-1" role="dialog"
        aria-labelledby="addDirectorateModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDirectorateModalLabel">Add New Directorate</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Add form fields here to collect data for the new Directorate -->
                    <form id="addDirectorateForm" method="POST" action="{{ route('directorates.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Directorate Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <!-- Add other fields as needed -->
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
