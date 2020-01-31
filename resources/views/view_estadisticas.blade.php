@extends('layout_html')
@section('head')
    <title>Estadísticas</title>
    <script src="{{URL::asset('https://www.gstatic.com/charts/loader.js')}}"></script>
    <script src="{{URL::asset('js/app.js')}}"></script>
    <script src="{{URL::asset('js/estadisticas.js')}}"></script>
@endsection

@section('contenido')
    <div class="m-lg-3">
        <h1>Estadísticas</h1>
        <div class="card text-center">
            <ul class="nav nav-pills nav-fill d-flex justify-content-between m-2 mb-0">
                <li class="nav-item" id="todas">
                    <a class="nav-link active todas" href="#" onclick="verTodas();">Todas <i
                            class="fas fa-chart-line"></i></a>
                </li>
                <li class="nav-item" id="tecnicos">
                    <a class="nav-link tecnicos" href="#" onclick="verTecnicos();">Técnicos <i class="fas fa-user"></i>
                    </a>
                </li>
                <li class="nav-item" id="tiempos">
                    <a class="nav-link tiempos" href="#" onclick="verTiempos();">Tiempos <i
                            class="fas fa-hourglass-half"></i></a>
                </li>
                <li class="nav-item" id="fechas">
                    <a class="nav-link fechas" href="#" onclick="verFechas();">Fechas <i
                            class="fas fa-calendar-day"></i></a>
                </li>
                <li class="nav-item" id="zonas">
                    <a class="nav-link zonas" href="#" onclick="verZonas();">Zonas <i class="far fa-map"></i></a>
                </li>
                <li class="nav-item" id="resolucion">
                    <a class="nav-link resolucion" href="#" onclick="verResolucion();">Resolución <i
                            class="fas fa-tools"></i></a>
                </li>
            </ul>
            <hr>
            <div class="card-body">
                <div class="row d-flex justify-content-sm-around m-2">
                    <div class="col-12" id="grafico_tecnico">
                        <div id="chart_div"></div>
                    </div>
                </div>
                <div class="row d-flex justify-content-sm-around m-2">
                    <div class="col-12" id="grafico_horas">
                        <div id="media_div"></div>
                    </div>
                </div>
                <div class="row d-flex justify-content-sm-around m-2">
                    <div class="col-12 col-lg-5 align-self-center" id="grafico_zonas">
                        <div id="donutchart"></div>
                    </div>
                    <div class="col-12 col-lg-5" id="grafico_resolucion">
                        <div id="myPieChart"></div>
                    </div>
                </div>
                <div class="row d-flex justify-content-sm-around m-2">
                    <div class="col-12 col-lg-12" id="grafico_fechas">
                        <div id="calendar_basic" style="width: 1000px; height: 350px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

