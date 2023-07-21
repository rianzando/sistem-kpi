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
                            <form action="{{ route('corporates.index') }}" method="GET">
                                <div class="input-group mb-3">
                                    <input type="text" name="keyword" class="form-control"
                                        placeholder="Search by name or email" value="{{ $keyword }}">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="submit">Search</button>
                                    </div>
                                </div>
                            </form>
                            <div class="table-responsive">
                                <a href="{{ route('corporates.create') }}" class="btn btn-outline-success"><i
                                        class="fa fa-plus-circle"> Add
                                        KPI</i></a>
                                <table class="table table-striped table-responsive-sm">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Goals</th>
                                            <th>KPI Corporate</th>
                                            <th>Target KPI</th>
                                            <th>Bobot</th>
                                            <th>Achivement</th>
                                            <th>Status</th>
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
                                                <td>
                                                    <a href="{{ route('corporates.edit', $corporates->id) }}"
                                                        class="btn btn-sm btn-warning" data-toggle="tooltip"
                                                        data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                                    <a href="{{ route('corporates.show', $corporates->id) }}"
                                                        class="btn btn-sm btn-primary" data-toggle="tooltip"
                                                        data-placement="top" title="Show"><i class="fa fa-eye"></i></a>
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
                                {{ $kpiCorporates->appends(['keyword' => $keyword])->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
