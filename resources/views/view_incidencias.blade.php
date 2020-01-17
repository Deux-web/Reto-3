<!doctype html>
<html lang="en">
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
    <title>Todas las incidencias</title>
    <script src="https://kit.fontawesome.com/122a23edb6.js" crossorigin="anonymous"></script>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{secure_asset('css/app.css')}}" rel="stylesheet">

    <style>
        body{
            display: grid;
            grid-template-rows: auto auto 1fr auto;
        }
    </style>
</head>
<body style="height: 100vh;">
<header>
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <img src="{{asset('images/road-tech-assistance.png')}}" width="100"
                 class="d-inline-block align-top" alt="">
        </a>
        <div class="row">
            <span class="text-primary col-12 float-right text-right">Bienvenido, Marciano Marcial</span>
            <div class="col-12">
                <a class="btn btn-primary float-right" href="">Cerrar sesión</a>
                <span class="float-right text-primary mr-3">Operador</span>
            </div>
        </div>
    </nav>
</header>

<div class="mt-2 row ml-2 mr-2">
    <a href="" class="btn btn-primary col-md-3 col-10 ml-auto mr-auto ml-md-0 mr-md-0 mb-1" style="font-size: 125%;">Nueva incidencia</a>
    <form class="d-inline form-inline form-sm mt-0 d-flex align-items-center justify-content-md-end justify-content-between col-10 col-md-8 ml-auto mr-auto mr-md-0 p-0 row">
        <input class="form-control form-control-sm col-8 col-md-6 mr-md-2" type="text" placeholder="Search"
               aria-label="Search" style="font-size: 125%">
        <input type="submit" value="Buscar" class="btn btn-primary col-3" style="font-size: 125%">
    </form>
</div>

<div class="pl-2 pr-2 overflow">
    <table class="mt-3 table table-striped table-hover">
        <thead class="bg-dark text-white">
        <tr>
            <th scope="col">Cod. Incidencia</th>
            <th scope="col">Título</th>
            <th scope="col">Hora apertura</th>
            <th scope="col">Cliente</th>
            <th scope="col">Contacto</th>
            <th scope="col">Técnico</th>
            <th scope="col">Tipo de avería</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>@mdo</td>
            <td>@mdo</td>
            <td>@mdo</td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
            <td>@mdo</td>
            <td>@mdo</td>
            <td>@mdo</td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
            <td>@mdo</td>
            <td>@mdo</td>
            <td>@mdo</td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
            <td>@mdo</td>
            <td>@mdo</td>
            <td>@mdo</td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
            <td>@mdo</td>
            <td>@mdo</td>
            <td>@mdo</td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
            <td>@mdo</td>
            <td>@mdo</td>
            <td>@mdo</td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
            <td>@mdo</td>
            <td>@mdo</td>
            <td>@mdo</td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
            <td>@mdo</td>
            <td>@mdo</td>
            <td>@mdo</td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
            <td>@mdo</td>
            <td>@mdo</td>
            <td>@mdo</td>
        </tr>

        </tbody>
    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>
</div>

<footer class="footer font-small pt-3 bg-dark text-white position-relative" style="bottom: 0;">
    <div class="container">
        <ul class="list-unstyled list-inline text-center mb-0">
            <li class="list-inline-item">
                <a class="btn-floating btn-fb mx-1" style="padding: 5px 10px; background-color: darkblue; border-radius: 50px">
                    <i class="fab fa-facebook-f fa-lg"> </i>
                </a>
            </li>
            <li class="list-inline-item">
                <a class="btn-floating btn-tw mx-1" style="padding: 5px 6px; background-color: #0089ff; border-radius: 50px">
                    <i class="fab fa-twitter fa-lg"> </i>
                </a>
            </li>
            <li class="list-inline-item">
                <a class="btn-floating btn-tw mx-1" style="padding: 5px 7px; background-color: black; border-radius: 50px">
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
