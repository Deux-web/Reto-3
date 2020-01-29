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
            width: 100%;
        }
    </style>
@endsection
@section('contenido')
    <div id="app" class="pt-2 pb-2">
        <div class="row ml-2 mr-2">
            @if($user->rol=='GERENTE' || $user->rol=='COORDINADOR')
                <input type="hidden" value="COORDINADOR_GERENTE" id="rol">
                <input type="hidden" id="ruta" value="{{route('incidencia.estadisticas')}}">
                <input type="hidden" id="ruta2" value="{{route('usuario.index')}}">
            @elseif($user->rol=='TECNICO')
                <input type="hidden" value="TECNICO" id="rol">
                <input type="hidden" id="ruta" value="">
            @else
                <input type="hidden" value="OPERARIO" id="rol">
                <input type="hidden" id="ruta" value="{{route('incidencia.create')}}">
            @endif
        </div>
        <incidencias-component></incidencias-component>
    </div>
@endsection
