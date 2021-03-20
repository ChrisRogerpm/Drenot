<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{!! csrf_token() !!}" />
    <title>Sistema para la Gestión y control de Notificaciones</title>

    <link rel="stylesheet" href="{{asset('css/compiled.css')}}">
    <link href="{{asset('assets/image/logokz.png')}}" rel="icon">
    <!-- <link rel="stylesheet" href="{{asset('assets/css/fontgoogle.css')}}"> -->
    <link href="{{asset('global_assets/css/icons/fontawesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('global_assets/css/icons/icomoon/styles.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/fontstyle.css')}}" rel="stylesheet" type="text/css">
    @stack('style')
</head>

<body class="sidebar-xs">

    <!-- Main navbar -->
    <div class="navbar navbar-expand-md navbar-dark bg-danger-800">
        <div class="navbar-brand">
            <a href="#" class="d-inline-block">
                <img src="{{asset('assets/image/logo.png')}}" alt="">
            </a>
        </div>

        <div class="d-md-none">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
                <i class="icon-tree5"></i>
            </button>
            <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
                <i class="icon-paragraph-justify3"></i>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="navbar-mobile">
            <ul class="navbar-nav mr-md-auto">
                <li class="nav-item">
                    <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
                        <i class="icon-paragraph-justify3"></i>
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav">
                <li class="nav-item dropdown dropdown-user">
                    <a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
                        <img src="{{asset('assets/image/default.jpg')}}" class="rounded-circle mr-2" height="34" alt="">
                        <span>{{Auth::user()->email}} | {{Auth::user()->NivelUsuario()}}
                        </span>
                        <!-- <span> {{Auth::user()->NivelUsuario()}}</span> -->
                    </a>

                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="javascript:void(0)" class="dropdown-item"><i class="icon-user"></i>PERFIL</a>
                        <a href="#" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="icon-switch2"></i> CERRAR SESIÓN</a>
                        <form id="logout-form" action="{{ route('CerrarSesion') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!-- /main navbar -->
    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
        <!-- sidebar-dark -->
        <div class="sidebar sidebar-dark bg-danger-800 sidebar-main bg-danger-800 sidebar-expand-md">

            <!-- Sidebar mobile toggler -->
            <div class="sidebar-mobile-toggler bg-danger-800 text-center">
                <a href="#" class="sidebar-mobile-main-toggle">
                    <i class="icon-arrow-left8"></i>
                </a>
                Navegación
                <a href="#" class="sidebar-mobile-expand">
                    <i class="icon-screen-full"></i>
                    <i class="icon-screen-normal"></i>
                </a>
            </div>
            <!-- /sidebar mobile toggler -->


            <!-- Sidebar content -->
            <div class="sidebar-content">
                <!-- User menu -->
                <div class="sidebar-user">
                    <div class="card-body">
                        <div class="media">
                            <div class="mr-3">
                                <a href="#"><img src="{{asset('assets/image/default.jpg')}}" width="38" height="38" class="rounded-circle" alt=""></a>
                            </div>
                            <div class="media-body">
                                <div class="media-title font-weight-semibold">{{Auth::user()->email}}</div>
                                <div class="font-size-xs opacity-50">
                                    <i class="icon-user font-size-sm"></i> &nbsp;{{Auth::user()->NivelUsuario()}}
                                </div>
                            </div>

                            <div class="ml-3 align-self-center">
                                <a href="#" class="text-white"><i class="icon-cog3"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /user menu -->
                <!-- Main navigation -->
                <div class="card card-sidebar-mobile">
                    <ul class="nav nav-sidebar" data-nav-type="accordion">
                        @include('Shared.app_sidebar')
                    </ul>
                </div>
                <!-- /main navigation -->

            </div>
            <!-- /sidebar content -->
        </div>
        <div class="content-wrapper">
            @yield('header')
            <div class="content">
                @yield('content')
            </div>
        </div>
    </div>
    <!-- Core JS files -->
    <script src="{{asset('css/compiled.js')}}"></script>
    @stack('js')
</body>

</html>