@extends('layouts.main')
@section('content')
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Buttons</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="#">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Base</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Buttons</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Button Original</h4>

                        </div>
                        <div class="card-body">
                            <p class="demo">
                                <button class="btn btn-default">Default</button>

                                <button class="btn btn-primary">Primary</button>

                                <button class="btn btn-secondary">Secondary</button>

                                <button class="btn btn-info">Info</button>

                                <button class="btn btn-success">Success</button>

                                <button class="btn btn-warning">Warning</button>

                                <button class="btn btn-danger">Danger</button>

                                <button class="btn btn-link">Link</button>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Button with Label</h4>

                        </div>
                        <div class="card-body">
                            <p class="demo">
                                <button class="btn btn-default">
                                    <span class="btn-label">
                                        <i class="fa fa-archive"></i>
                                    </span>
                                    Default
                                </button>

                                <button class="btn btn-primary">
                                    <span class="btn-label">
                                        <i class="fa fa-bookmark"></i>
                                    </span>
                                    Primary
                                </button>

                                <button class="btn btn-secondary">
                                    <span class="btn-label">
                                        <i class="fa fa-plus"></i>
                                    </span>
                                    Secondary
                                </button>

                                <button class="btn btn-info">
                                    <span class="btn-label">
                                        <i class="fa fa-info"></i>
                                    </span>
                                    Info
                                </button>

                                <button class="btn btn-success">
                                    <span class="btn-label">
                                        <i class="fa fa-check"></i>
                                    </span>
                                    Success
                                </button>

                                <button class="btn btn-warning">
                                    <span class="btn-label">
                                        <i class="fa fa-exclamation-circle"></i>
                                    </span>
                                    Warning
                                </button>

                                <button class="btn btn-danger">
                                    <span class="btn-label">
                                        <i class="fa fa-heart"></i>
                                    </span>
                                    Danger
                                </button>

                                <button class="btn btn-link">
                                    <span class="btn-label">
                                        <i class="fa fa-link"></i>
                                    </span>
                                    Link
                                </button>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Button Icon</h4>

                        </div>
                        <div class="card-body">
                            <p class="demo">
                                <button type="button" class="btn btn-icon btn-round btn-default">
                                    <i class="fa fa-align-left"></i>
                                </button>

                                <button type="button" class="btn btn-icon btn-round btn-primary">
                                    <i class="fab fa-twitter"></i>
                                </button>

                                <button type="button" class="btn btn-icon btn-round btn-secondary">
                                    <i class="fa fa-bookmark"></i>
                                </button>

                                <button type="button" class="btn btn-icon btn-round btn-info">
                                    <i class="fa fa-info"></i>
                                </button>

                                <button type="button" class="btn btn-icon btn-round btn-success">
                                    <i class="fa fa-check"></i>
                                </button>

                                <button type="button" class="btn btn-icon btn-round btn-warning">
                                    <i class="fa fa-exclamation-circle"></i>
                                </button>

                                <button type="button" class="btn btn-icon btn-round btn-danger">
                                    <i class="fa fa-heart"></i>
                                </button>

                                <button type="button" class="btn btn-icon btn-link">
                                    <i class="fa fa-link"></i>
                                </button>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Disabled Button</h4>

                        </div>
                        <div class="card-body">
                            <p class="demo">
                                <button class="btn btn-default" disabled="disabled">Default</button>

                                <button class="btn btn-primary" disabled="disabled">Primary</button>

                                <button class="btn btn-secondary" disabled="disabled">Secondary</button>

                                <button class="btn btn-info" disabled="disabled">Info</button>

                                <button class="btn btn-success" disabled="disabled">Success</button>

                                <button class="btn btn-warning" disabled="disabled">Warning</button>

                                <button class="btn btn-danger" disabled="disabled">Danger</button>

                                <button class="btn btn-link" disabled>Link</button>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Button Size</h4>

                        </div>
                        <div class="card-body">
                            <p class="demo">
                                <button class="btn btn-primary btn-lg">Large</button>

                                <button class="btn btn-primary">Normal</button>

                                <button class="btn btn-primary btn-sm">Small</button>

                                <button class="btn btn-primary btn-xs">Extra Small</button>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Button Type</h4>

                        </div>
                        <div class="card-body">
                            <p class="demo">
                                <button class="btn btn-primary">Normal</button>
                                <button class="btn btn-primary btn-border">Border</button>

                                <button class="btn btn-primary btn-round">Round</button>

                                <button class="btn btn-primary btn-border btn-round">Round</button>

                                <button class="btn btn-primary btn-link">Link</button>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Nav Pills</h4>

                        </div>
                        <div class="card-body">
                            <ul class="nav nav-pills nav-primary">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#">Active</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Link</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Link</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link disabled" href="#">Disabled</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Pagination</h4>

                        </div>
                        <div class="card-body">
                            <div class="demo">
                                <ul class="pagination pg-primary">
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="container-fluid">
            <nav class="pull-left">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="https://www.themekita.com">
                            ThemeKita
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            Help
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            Licenses
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="copyright ml-auto">
                2018, made with <i class="fa fa-heart heart text-danger"></i> by <a
                    href="https://www.themekita.com">ThemeKita</a>
            </div>
        </div>
    </footer>
    </div>
    </div>
@endsection
