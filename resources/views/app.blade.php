
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('title') {{$app_name}}</title>
        
        @include('partials.sb-head')
        @include('partials.sb-datatable-css')

        <script>
            let states_cities = <?= isset($states_cities) ? $states_cities : 'null' ?>;
        </script>
    </head>
    <body class="sb-nav-fixed">

        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="{{url('/admin')}}">{{$app_name}}</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="{{url('/admin/settings')}}">Settings</a>
                        <a class="dropdown-item" href="{{url('/admin/logout')}}">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link actived" href="{{url('/admin')}}"
                                ><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard</a
                            >
                            <a class="nav-link" href="{{url('/admin/users')}}"
                                ><div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Users</a
                            >
                            <a class="nav-link" href="{{url('/admin/settings')}}"
                                ><div class="sb-nav-link-icon"><i class="fas fa-cog"></i></div>
                                Settings</a>

                            <a class="nav-link" href="{{url('/admin/banners')}}"
                            ><div class="sb-nav-link-icon"><i class="fas fa-images"></i></div>
                            Banners</a>

                            <a class="nav-link" href="{{url('')}}" target="_blank"
                                ><div class="sb-nav-link-icon"><i class="fas fa-rss-square"></i></div>
                                Principal
                                </a
                            >
                            
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logado como:</div>
                        {{$admin->name}}
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                
                <main>
                    <div class="container-fluid">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (session('success'))

                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                        @endif

                        @if (session('warning'))

                            <div class="alert alert-warning">
                                {{session('warning')}}
                            </div>
                        @endif

                        @yield('content')
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; {{$app_name}} <?= date("Y"); ?></div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        @include('partials.sb-js')
        @include('partials.sb-datatable-js')
    </body>

</html>
