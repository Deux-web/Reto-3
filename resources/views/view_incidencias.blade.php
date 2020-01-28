@extends('layout_html')
@section('head')
    <title>Todas las incidencias</title>
    <script src="{{URL::asset('js/app.js')}}"></script>
    <script src="{{URL::asset('js/incidencias.js')}}"></script>
    <style>
        .pagination {
            position: absolute;
            bottom: 0;
            left: 30%;
            right: 30%;
        }

        div.overflow table {
            height: 90%;
        }

        div.overflow {
            position: relative;
        }

        #app {
            height: 100%;
        }
    </style>
@endsection
@section('contenido')
    <div id="app" class="pt-2 pb-2">
        <div class="row ml-2 mr-2">
            @if($user->rol=='GERENTE')
                <a href='{{route('incidencia.estadisticas')}}'
                   class="btn btn-primary col-md col-10 ml-auto mr-auto ml-md-0 mr-md-1 mb-1"
                   style="font-size: 125%;">
                    Estadísticas
                </a>
                <a href="{{route('usuario.create')}}"
                   class="btn btn-primary col-md col-10 ml-auto mr-auto ml-md-0 mr-md-0 mb-1"
                   style="font-size: 125%;">
                    Dar de alta usuarios
                </a>
            @elseif($user->rol=='COORDINADOR')
                <a href="{{route('usuario.create')}}"
                   class="btn btn-primary col-md col-10 ml-auto mr-auto ml-md-0 mr-md-0 mb-1"
                   style="font-size: 125%;">
                    Dar de alta usuarios
                </a>
            @elseif($user->rol=='TECNICO')
                <a href="" class="btn btn-primary col-md-2 col-10 ml-auto mr-auto ml-md-0 mr-md-0 mb-1"
                   style="font-size: 125%;">Ver mis incidencias</a>
            @else <!-- Coordinador -->
                <a href="{{route('incidencia.create')}}"
                   class="btn btn-primary col-md-2 col-10 ml-auto mr-auto ml-md-0 mr-md-0 mb-1"
                   style="font-size: 125%;">Nueva
                    incidencia
                </a>
            @endif
        </div>
        <incidencias-component></incidencias-component>
    </div>
@endsection
