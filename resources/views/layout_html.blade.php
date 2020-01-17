<!doctype html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Heebo&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{secure_asset('css/app.css')}}" rel="stylesheet">
    @yield('head')
</head>
<body style="height: 100vh;">
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
</body>
</html>
