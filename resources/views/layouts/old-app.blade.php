<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">




    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top alert-home">
            <a class="navbar-brand" href="{{route('home')}}">
                <img src= "{{asset('img/logo.svg')}}" width="30" height="30" class="d-inline-block align-top" alt="">
                Dropbox
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample06" aria-controls="navbarsExample06" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample06">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('home')}}">Inicio <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Características</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown06" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aprende más</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown06">
                            <a class="dropdown-item" href="{{route('secure')}}">Seguridad</a>
                            <a class="dropdown-item" href="#">Clientes</a>
                            <a class="dropdown-item" href="#">Preguntas frecuentes</a>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('login')}}" class="btn btn-outline-primary">Ingresar</a>                    </li>
                </ul>
            </div>
        </nav>
    </header>




</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

        <div class="alert-home "></div>

        <footer class="container py-5">
            <div class="row">
                <div class="col-12 col-md">

                    <img src="{{asset('img/logo.svg')}}" width="100">
                    <small class="d-block mb-3 text-muted text-left">® Dropbox</small>
                </div>

                <div class="col-sm-6 col-md-3">
                    <h5>Dropbox</h5>
                    <p class="text-small text-muted">
                        Los pagos y el almacenamiento dentro de nuestra plataforma son totalmente seguros. Los archivos estarán disponibles instantáneamente. Contamos con un servicio de almacenamiento 24/7
                    </p>
                </div>

                <div class="col-sm-6 col-md-3 text-center">
                    <h5>Más información</h5>
                    <ul class="list-unstyled text-small">
                        <li><a class="text-muted" href="#">Youtube</a></li>
                        <li><a class="text-muted" href="#">GitHub</a></li>
                        <li><a class="text-muted" href="#">Twitter</a></li>
                        <li><a class="text-muted" href="#">Café y Código</a></li>
                    </ul>
                </div>
                <div class="col-sm-6 col-md-3 text-right">
                    <h5>Medios de pago</h5>
                    <img class="img-fluid" src="{{asset('http://3.bp.blogspot.com/-oumQWdMsBL8/Vh94mt2nYLI/AAAAAAAAANQ/qPwSgz1YgJc/s400/Payment%2BCard%2BNetworks%2BLogo.jpg')}}" width="220">
                </div>
        </footer>
    </div>
</body>
</html>
