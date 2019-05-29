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
        <a class="navbar-brand ml-4 pt-4" href="{{ route('home') }}">
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
            @include('admin.partials.menu')
        </ul>
    </nav>

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

        <script src="{{ asset('js/bootstrap.min.js') }}"></script>

@yield('scripts')

</body>
</html>
