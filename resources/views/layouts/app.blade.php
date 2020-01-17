<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <header>
        <nav class="navbar navbar-dark bg-dark">
            <a class="navbar-brand" href="{{route('incidencias.index')}}">
                <img src="{{asset('images/road-tech-assistance.png')}}" width="100"
                     class="d-inline-block align-top" alt="">
            </a>
            <div class="row">
                @guest
                    <div class="col-12">
                        <a class="btn btn-primary float-right" href="{{ route('login') }}">Login</a>
                    </div>
                @else
                    <span class="text-primary col-12 float-right text-right">Bienvenido, {{ Auth::user()->name }}</span>
                    <div class="col-12">
                        <a class="btn btn-primary float-right" href="{{ route('logout') }}" onclick="
                           event.preventDefault();
                           document.getElementById('logout-form').submit();">
                            Cerrar sesión
                        </a>
                        <form id="" action="{{ route('logout') }}" method="POST"
                              style="display: none;">
                            @csrf
                        </form>
                        <span class="float-right text-primary mr-3">{{ Auth::user()->rol }}</span>
                    </div>
                @endif
            </div>
        </nav>
    </header>
    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>
</html>
