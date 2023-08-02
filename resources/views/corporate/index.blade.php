@extends('layouts.main')
@section('title', 'KPI Corporates')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-12 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">KPI Corporate List</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">KPI Corporate</a></li>
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
                            <h4 class="card-title">List Data KPI Corporates</h4>
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
                            {{-- <form action="{{ route('corporates.index') }}" method="GET">
                                <div class="input-group mb-3">
                                    <input type="text" name="keyword" class="form-control"
                                        placeholder="Search by target kpi corporate" value="{{ $keyword }}">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="submit">Search</button>
                                    </div>
                                </div>
                            </form> --}}
                            <div class="table-responsive">
                                <a href="{{ route('corporates.create') }}" class="btn btn-outline-success"><i
                                        class="fa fa-plus-circle"></i></a>
                                <div class="card">
                                    <div class="card-header">
                                        <form action="{{ route('corporates.index') }}" method="GET">
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
                                            <form action="{{ route('corporates.index') }}" method="GET">
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
                                <table class="table table-bordered table-hover table-responsive-sm">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Goals</th>
                                            <th>KPI Corporate</th>
                                            <th>Target KPI</th>
                                            <th>Bobot</th>
                                            <th>Achivement</th>
                                            <th>Status</th>
                                            <th>Created</th>
                                            <th>Updated</th>
                                            <th style="width: 15%"></th>
                                        </tr>
                                    </thead>
                                    @forelse ($kpiCorporates as $corporates)
                                        <tbody>
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $corporates->goals }}</td>
                                                <td>{{ $corporates->kpi_corporate }}</td>
                                                <td>{{ $corporates->target_corporate }}</td>
                                                <td>{{ $corporates->bobot }}</td>
                                                <td>{{ $corporates->achievement }}</td>
                                                <td>{{ $corporates->status }}</td>
                                                <td>{{ $corporates->user->name }}</td>
                                                <td>{{ $corporates->user->name }}</td>
                                                <td>
                                                    <a href="{{ route('corporates.edit', $corporates->id) }}"
                                                        class="btn btn-sm btn-warning" data-toggle="tooltip"
                                                        data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                                    <button class="btn btn-sm btn-primary btn-show" data-toggle="modal"
                                                        data-target="#detailModal" data-goals="{{ $corporates->goals }}"
                                                        data-kpi="{{ $corporates->kpi_corporate }}"
                                                        data-target_corporate="{{ $corporates->target_corporate }}"
                                                        data-bobot="{{ $corporates->bobot }}"
                                                        data-year="{{ $corporates->year }}"
                                                        data-achievement="{{ $corporates->achievement }}"
                                                        data-status="{{ $corporates->status }}" data-toggle="tooltip"
                                                        data-placement="top" title="show">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                    <form class="d-inline" method="post"
                                                        action="{{ route('corporates.destroy', $corporates->id) }}"
                                                        data-user="{{ $corporates->id }}">
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
                                                <td colspan="10" class="text-center">Data Kpi Corporate Masih Kosong</td>
                                            </tr>
                                        </tfoot>
                                    @endforelse
                                </table>
                                {{ $kpiCorporates->appends(['keyword' => $search])->links() }}
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
                    <h5 class="modal-title" id="detailModalLabel">KPI Corporate Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><strong>Goals:</strong> <span id="modal-goals"></span></p>
                    <p><strong>KPI Corporate:</strong> <span id="modal-kpi"></span></p>
                    <p><strong>Target Corporate:</strong> <span id="modal-target"></span></p>
                    <p><strong>Bobot:</strong> <span id="modal-bobot"></span></p>
                    <p><strong>Year:</strong> <span id="modal-year"></span></p>
                    <p><strong>Achievement:</strong> <span id="modal-achievement"></span></p>
                    <p><strong>Status:</strong> <span id="modal-status"></span></p>
                    <!-- Add other fields as needed -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Function to handle the modal data
        function openModal(event) {
            const button = event.currentTarget;
            const goals = button.dataset.goals;
            const kpi = button.dataset.kpi;
            const target = button.dataset.target_corporate; // Corrected attribute name
            const bobot = button.dataset.bobot;
            const year = button.dataset.year;
            const achievement = button.dataset.achievement;
            const status = button.dataset.status;

            // Set the data to the modal elements
            document.getElementById('modal-goals').textContent = goals;
            document.getElementById('modal-kpi').textContent = kpi;
            document.getElementById('modal-target').textContent = target;
            document.getElementById('modal-bobot').textContent = bobot;
            document.getElementById('modal-year').textContent = year;
            document.getElementById('modal-achievement').textContent = achievement;
            document.getElementById('modal-status').textContent = status;
        }

        // Add event listener to each "Show" button to open the modal
        const showButtons = document.querySelectorAll('.btn-show');
        showButtons.forEach(button => {
            button.addEventListener('click', openModal);
        });
    </script>


    <script>
        // Function to show the SweetAlert confirmation dialog
        function showDeleteConfirmation(form) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'You are about to delete this KPI Corporate data. This action cannot be undone!',
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
