@extends('layout_html')
@section('head')
    <title>Estadisticas</title>
    <script src="{{URL::asset('https://www.gstatic.com/charts/loader.js')}}"></script>
    <script src="{{URL::asset('js/app.js')}}"></script>
    <script src="{{URL::asset('js/estadisticas.js')}}"></script>

@endsection
@section('contenido')
    <div class="m-lg-3">
        <h1>Estadísticas</h1>

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
                            <div class="col-5 align-self-center mt-1"><h1><i class="fas fa-hourglass-half"></i></h1></div>
                        </div>
                    </div>
                    <div class="col-2 rounded" style="background-color: #181c30;color:white;">
                        <div class="row d-flex justify-content-around align-self-center">
                            <div class="col-6 align-self-center"><h5>Zonas</h5></div>
                            <div class="col-6 align-self-center mt-1"><h1><i class="far fa-map"></i></h1></div>
                        </div>
                    </div>
                    <div class="col-2 rounded" style="background-color: #181c30;color:white;">
                        <div class="row d-flex justify-content-around align-self-center">
                            <div class="col-6 align-self-center"><h5>Fechas</h5></div>
                            <div class="col-6 align-self-center mt-1"><h1><i class="fas fa-calendar-day"></i></h1></div>
                        </div>
                    </div>
                    <div class="col-2 rounded" style="background-color: #181c30;color:white;">
                        <div class="row d-flex justify-content-around align-self-center">
                            <div class="col-8 align-self-center"><h5>Resolucion</h5></div>
                            <div class="col-4 align-self-center mt-1"><h1><i class="fas fa-tools"></i></h1></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row d-flex justify-content-sm-around m-2">
                    <div class="col-5">
                        <img class="img-fluid" src="{{URL::asset('images/tec.png')}}"/>
                    </div>
                    <div class="col-5 align-self-center">
                        <img class="img-fluid" src="{{URL::asset('images/hora.png')}}"/>
                    </div>
                </div>
                <div class="row d-flex justify-content-sm-around m-2">
                    <div class="col-10 d-flex justify-content-center">
                        <div id="chart_div" style="width: 450px; height: 250px;"></div>
                    </div>
                </div>

                <div class="row d-flex justify-content-sm-around m-2">
                    <div class="d-none">
                        <p  id="total_incidencias">{{sizeof($total_incidencias)}} </p>
                        <p  id="insitu">{{sizeof($resolucion_insitu)}}</p>
                        <p  id="taller">{{sizeof($resolucion_taller)}}</p>
                    </div>
                    <div class="col-5">
                        <img class="img-fluid" src="{{URL::asset('images/time.png')}}"/>
                    </div>
                    <div class="col-5">
                        <div id="myPieChart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
