<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gofra</title>
    <link rel="icon" href="{{ asset('gofra.jpg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet"
        href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="{{ asset('gofra.jpg') }}" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text">Gofra</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <div class="d-flex">
                    <div class="image">
                        @if (auth()->check() && auth()->user()->image)
                            <img src="{{ asset('storage/' . auth()->user()->image) }}" class="img-circle elevation-2"
                                alt="User Image">
                        @endif
                    </div>
                </div>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}"
                                class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                                <i class="fas fa-dashboard"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li
                            class="nav-item has-treeview {{ request()->is('users*') || request()->is('roles*') || request()->is('permissions*') || request()->is('groups*') ? 'menu-open' : '' }}">
                            <a href="#"
                                class="nav-link {{ request()->is('users*') || request()->is('roles*') || request()->is('permissions*') || request()->is('groups*') ? 'active' : '' }}">
                                <i class="fas fa-cogs"></i>
                                <p>
                                    Auth
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('users.index') }}"
                                        class="nav-link {{ request()->is('users*') ? 'active' : '' }}">
                                        <i class="fas fa-user"></i>
                                        <p>Users</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('roles.index') }}"
                                        class="nav-link {{ request()->is('roles*') ? 'active' : '' }}">
                                        <i class="fas fa-user-shield"></i>
                                        <p>Roles</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('permissions.index') }}"
                                        class="nav-link {{ request()->is('permissions*') ? 'active' : '' }}">
                                        <i class="fas fa-lock"></i>
                                        <p>Permissions</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('groups.index') }}"
                                        class="nav-link {{ request()->is('groups*') ? 'active' : '' }}">
                                        <i class="fas fa-users"></i>
                                        <p>Groups</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('sections.index') }}"
                                class="nav-link {{ request()->is('sections*') ? 'active' : '' }}">
                                <i class="fas fa-layer-group"></i>
                                <p>Sections</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('workers.index') }}"
                                class="nav-link {{ request()->is('workers*') ? 'active' : '' }}">
                                <i class="fas fa-users-cog"></i>
                                <p>Workers</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('warehouses.index') }}"
                               class="nav-link {{ request()->is('warehouses*') ? 'active' : '' }}">
                                <i class="fas fa-car"></i>
                                <p>Warehouses</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('row_materials.index') }}"
                               class="nav-link {{ request()->is('row_materials*') ? 'active' : '' }}">
                                <i class="fas fa-user"></i>
                                <p>row_materials</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('invoices.index') }}"
                               class="nav-link {{ request()->is('invoices*') ? 'active' : '' }}">
                                <i class="fas fa-pencil"></i>
                                <p>Invoices</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('machines.index') }}"
                               class="nav-link {{ request()->is('machines*') ? 'active' : '' }}">
                                <i class="fas fa-car"></i>
                                <p>Machines</p>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <form action="{{ route('logout') }}" method="POST"
                                class="d-flex align-items-center w-100">
                                @csrf
                                <button type="submit"
                                    class="btn btn-link text-danger w-100 text-start d-flex align-items-center">
                                    <i class="fas fa-sign-out-alt me-2"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </section>
        </div>
    </div>
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
    <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
    <script src="{{ asset('dist/js/demo.js') }}"></script>
    <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>
