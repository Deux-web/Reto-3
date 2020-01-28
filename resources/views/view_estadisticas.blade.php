@extends('layout_html')
@section('head')
    <title>Estadisticas</title>
    <script src="{{URL::asset('https://www.gstatic.com/charts/loader.js')}}"></script>
    <script src="{{URL::asset('js/app.js')}}"></script>
    <script src="{{URL::asset('js/estadisticas.js')}}"></script>
    <script src="{{URL::asset('js/estadisticas_resulucion.js')}}"></script>
    <script src="{{URL::asset('js/estadisticas_tecnicos.js')}}"></script>
    <script src="{{URL::asset('js/estadisticas_zonas.js')}}"></script>


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
                    <a class="nav-link tecnicos" href="#" onclick="verTecnicos();">Tecnicos <i class="fas fa-user"></i>
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
                    <div class="col-12 col-lg-5" id="grafico_tecnico">
                        <!--INCIDENDIAS POR TECNICOS-->
                        <div id="chart_div"></div>
                        <div class="d-none">
                            {{--<p class="n_inc">{{$inc_por_tecnico}}</p>
                            @foreach($tecnicos as $tecnico)
                                <p class="nombre_tec">{{$tecnico->nombre}} </p>
                            @endforeach--}}
                        </div>
                    </div>
                    <div class="col-12 col-lg-5 align-self-center" id="grafico_horas">
                        <img class="img-fluid" src="{{URL::asset('images/hora.png')}}"/>
                    </div>
                </div>
                <div class="row offset-2">
                    <div class="col-12 d-flex justify-content-center" id="grafico_zonas">
                        <!--Por zonas -->
                        <div class="d-none">
                            <p id="inc_gipuzkoa">{{sizeof($incidencias_gipuzkoa)}}</p>
                            <p id="inc_araba">{{sizeof($incidencias_araba)}}</p>
                            <p id="inc_bizkaia">{{sizeof($incidencias_bizkaia)}}</p>
                            <p id="inc_nafarroa">{{sizeof($incidencias_nafarroa)}}</p>
                        </div>
                        <div id="donutchart" style="width: 900px; height: 500px;"></div>
                    </div>
                </div>

                <div class="row d-flex justify-content-sm-around m-2">

                    <div class="col-12 col-lg-5" id="grafico_fechas">
                        <p>Grafico de fechas</p>
                        <img class="img-fluid" src="{{URL::asset('images/time.png')}}"/>
                    </div>

                    <div class="col-12 col-lg-5" id="grafico_resolucion">
                        <div class="d-none">
                            <p id="total_incidencias">{{sizeof($total_incidencias)}} </p>
                            <p id="insitu">{{sizeof($resolucion_insitu)}}</p>
                            <p id="taller">{{sizeof($resolucion_taller)}}</p>
                        </div>
                        <div id="myPieChart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ModalResolucion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tipo de resolución</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Inserta gráfico aquí</p>
                    <div id="myPieChart"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

@endsection

