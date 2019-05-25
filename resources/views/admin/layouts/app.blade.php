<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    {{--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
          integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">--}}

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Dropbox - Dashboard') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

</head>

<body>


<div class="wrapper">
    <!-- Sidebar Holder -->
    <nav id="sidebar">
        <a class="navbar-brand ml-4 pt-4" href="#">
            <img src="{{asset('img/logo-white.png')}}" width="30" height="30" class="d-inline-block align-top" alt="">
            Dropbox
        </a>

        <div class="container mt-4 mb-2">
            <div class="mb-2">
                <img src="{{asset('img/users/user.jpg')}}" class="img-responsive" style="border-radius: 50%;" alt=""
                     width="70">
            </div>
            <div class="profile-usertitle">
                <div class="profile-usertitle-name">{{ auth()->user()->name }}</div>
                <div class="profile-usertitle-status">{{ auth()->user()->email }}</div>
            </div>
        </div>


        <ul class="list-unstyled components">
            <li class="active">
                <a href="#"><i class="fas fa-chart-line"></i> Panel</a>
            </li>

            <li>
                <a href="#profileSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i
                            class="fas fa-user-circle"></i> Mi perfil</a>
                <ul class="collapse list-unstyled" id="profileSubmenu">
                    <li>
                        <a href="#">Ver mi perfil</a>
                    </li>
                    <li>
                        <a href="#">Actualizar perfil</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#filesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-file-upload"></i> Mis archivos
                </a>
                <ul class="collapse list-unstyled" id="filesSubmenu">
                    <li>
                        <a href="{{ route('file.create') }}">Agregar archivo</a>
                    </li>
                    <li>
                        <a href="{{ route('file.images') }}">Imágenes</a>
                    </li>
                    <li>
                        <a href="{{ route('file.videos') }}">Videos</a>
                    </li>
                    <li>
                        <a href="{{ route('file.audios') }}">Audio</a>
                    </li>
                    <li>
                        <a href="{{ route('file.documents') }}">Documentos</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#rolesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-unlock-alt"></i>
                    Roles
                </a>
                <ul class="collapse list-unstyled" id="rolesSubmenu">
                    <li>
                        <a href="{{ route ('role.index') }}">Ver todos</a>
                    </li>
                    <li>
                        <a href="{{ route ('role.create') }}">Agregar rol</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#permissionSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-fingerprint"></i> Permisos
                </a>
                <ul class="collapse list-unstyled" id="permissionSubmenu">
                    <li>
                        <a href="{{ route ('permissions.index') }}">Ver todos</a>
                    </li>
                    <li>
                        <a href="{{ route ('permissions.create') }}">Agregar permiso</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-users"></i> Usuarios
                </a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
                        <a href="#">Ver todos</a>
                    </li>
                    <li>
                        <a href="#">Agregar rol</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="far fa-question-circle"></i> Soporte
                </a>
            </li>
        </ul>

        <ul class="list-unstyled CTAs">
            <li>
                <a href="{{ route('logout') }}" class="logout"
                   onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                    <i class="fas fa-power-off"></i> Cerrar sesión
                </a>
            </li>
        </ul>
    </nav>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <div id="content">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="navbar-btn">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>

                <div id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item">
                            <a>@yield('page')</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        @include ('admin.partials.alert')
        @include ('admin.partials.error')

    @yield('content')

    <script src="{{asset('js/slim.js')}}"></script>

    {{--//script minimizar y maximizar el menu--}}
    <script type="text/javascript">
        $( document ).ready( function () {
            $( '#sidebarCollapse' ).on( 'click', function () {
                $( '#sidebar' ).toggleClass( 'active' );
                $( this ).toggleClass( 'active' );
            } );
        } );
    </script>


@yield('scripts')


</body>
</html>
