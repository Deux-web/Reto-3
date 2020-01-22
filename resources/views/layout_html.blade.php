<!doctype html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Heebo&display=swap" rel="stylesheet">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{secure_asset('css/app.css')}}" rel="stylesheet">
    <link rel="shortcut icon" href="{{URL::asset('images/road-tech-assistance.ico')}}}" type="image/x-icon">
    <script src="https://kit.fontawesome.com/122a23edb6.js" crossorigin="anonymous"></script>
    <style>
        body {
            display: grid;
            grid-template-rows: auto 1fr auto;
        }
        header{
            z-index: 100;
        }
        footer{
            z-index: 100;
        }
    </style>
    @yield('head')
</head>
<body style="height: 100vh;">
<header>
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="{{route('incidencia.index')}}">
            <img src="{{asset('images/road-tech-assistance.png')}}" width="100"
                 class="d-inline-block align-top" alt="">
        </a>
        <div class="row">
            @guest
            @else
                <span class="text-primary col-12 float-right text-right">Bienvenido, {{ Auth::user()->name }}</span>
                <div class="col-12">
                    <a class="btn btn-primary float-right" href="{{ route('logout') }}" onclick="
                           event.preventDefault();
                           document.getElementById('logout-form').submit();">
                        Cerrar sesión
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                          style="display: none;">
                        @csrf
                    </form>
                    <span class="float-right text-primary mr-3">{{ Auth::user()->rol }}</span>
                </div>
            @endif
        </div>
    </nav>
</header>
@yield('contenido')
<footer class="footer font-small pt-3 bg-dark text-white position-relative" style="bottom: 0;">
    <div class="container">
        <ul class="list-unstyled list-inline text-center mb-0">
            <li class="list-inline-item">
                <a class="btn-floating btn-fb mx-1"
                   style="padding: 5px 10px; background-color: darkblue; border-radius: 50px">
                    <i class="fab fa-facebook-f fa-lg"> </i>
                </a>
            </li>
            <li class="list-inline-item">
                <a class="btn-floating btn-tw mx-1"
                   style="padding: 5px 6px; background-color: #0089ff; border-radius: 50px">
                    <i class="fab fa-twitter fa-lg"> </i>
                </a>
            </li>
            <li class="list-inline-item">
                <a class="btn-floating btn-tw mx-1"
                   style="padding: 5px 7px; background-color: black; border-radius: 50px">
                    <i class="fab fa-github fa-lg"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="footer-copyright text-center pt-3 pb-2">© 2020 Copyright:
        <a href="https://github.com/deux-web" target="_blank"> Deux </a>
    </div>
</footer>
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/mapa.js')}}"></script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key={{\Config::get('services')['google']['maps']['api-key']}}&callback=initMap">
</script>
</body>
</html>
