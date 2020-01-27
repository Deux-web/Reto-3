@extends('layout_html')
@section('head')
    <title>Estadisticas</title>
    <script src="{{URL::asset('https://www.gstatic.com/charts/loader.js')}}"></script>
    <script src="{{URL::asset('js/app.js')}}"></script>
    <script src="{{URL::asset('js/estadisticas.js')}}"></script>
    <script src="{{URL::asset('js/estadisticas_tecnicos.js')}}"></script>
    <script src="{{URL::asset('js/estadisticas_zonas.js')}}"></script>

@endsection
@section('contenido')
    <div class="m-lg-3">
        <h1>Estadísticas {{$numero_incidencias_por_tecnico}}</h1>
        <div class="card text-center">
            <div class="card-header">
                <div class="row d-flex justify-content-around">
                    <div class="col-2 rounded" style="background-color: #181c30;color:white;">
                        <div class="row d-flex justify-content-around align-self-center">
                            <div class="col-7 align-self-center"><h5>Tecnicos</h5></div>
                            <div class="col-5 align-self-center mt-1"><h1><i class="fas fa-user"></i></h1></div>
                        </div>
                    </div>
                    <div class="col-2 rounded" style="background-color: #181c30;color:white;">
                        <div class="row d-flex justify-content-around align-self-center">
                            <div class="col-7 align-self-center"><h5>Tiempos</h5></div>
                            <div class="col-5 align-self-center mt-1"><h1><i class="fas fa-hourglass-half"></i></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 rounded" style="background-color: #181c30;color:white;">
                        <div class="row d-flex justify-content-around align-self-center">
                            <div class="col-6 align-self-center"><h5>Zonas</h5></div>
                            <div class="col-6 align-self-center mt-1"><h1><i class="far fa-map"></i></h1></div>
                        </div>
                    </div>
                    <div class="col-2 rounded" style="background-color: #181c30;color:white;">
                        <div class="row d-flex justify-content-around align-self-center" data-toggle="modal"
                             data-target="#ModalFechas">
                            <div class="col-6 align-self-center"><h5>Fechas</h5></div>
                            <div class="col-6 align-self-center mt-1"><h1><i class="fas fa-calendar-day"></i></h1></div>
                        </div>
                    </div>
                    <div class="col-2 rounded" style="background-color: #181c30;color:white;">
                        <div class="row d-flex justify-content-around align-self-center" data-toggle="modal"
                             data-target="#ModalResolucion">
                            <div class="col-8 align-self-center"><h5>Resolucion</h5></div>
                            <div class="col-4 align-self-center mt-1"><h1><i class="fas fa-tools"></i></h1></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row d-flex justify-content-sm-around m-2">
                    <div class="col-5">
                        <!-- TECNICOS-->
                        <div id="chart_div"></div>
                        <div class="d-none">
                            @foreach($tecnicos as $tecnico)
                                <p class="nombre_tec">{{$tecnico->nombre}} </p>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-5 align-self-center">
                        <img class="img-fluid" src="{{URL::asset('images/hora.png')}}"/>
                    </div>
                </div>
                <div class="row d-flex justify-content-sm-around m-2">
                    <div class="col-10 d-flex justify-content-center">
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

                    <div class="col-5">

                    </div>

                    <div class="col-5">
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

