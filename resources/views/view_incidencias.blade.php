@extends('layout_html')
@section('head')
    <title>Todas las incidencias</title>
    <script src="{{URL::asset('js/app.js')}}"></script>
    <script src="{{URL::asset('js/incidencias.js')}}"></script>
    <style>
        .pagination{
            position: absolute;
            bottom: 0;
            left: 30%;
            right: 30%;
        }
        div.overflow table{
            height: 90%;
        }
        div.overflow{
            position: relative;
        }
        #app{
            height: 100%;
            display: grid;
            grid-template-rows: auto 1fr;
        }
    </style>
@endsection
@section('contenido')
    <div>
        <div id="app" class="pt-2 pb-2">
            <div class="row ml-2 mr-2">
                <a href="{{route('incidencia.create')}}"
                   class="btn btn-primary col-md-3 col-10 ml-auto mr-auto ml-md-0 mr-md-0 mb-1"
                   style="font-size: 125%;">Nueva
                    incidencia</a>
                <form
                    class="d-inline form-inline form-sm mt-0 d-flex align-items-center justify-content-md-end justify-content-between col-10 col-md-8 ml-auto mr-auto mr-md-0 p-0 row">
                    <input class="form-control form-control-sm col-8 col-md-6 mr-md-2" type="text" placeholder="Search"
                           aria-label="Search" style="font-size: 125%">
                    <input type="submit" value="Buscar" class="btn btn-primary col-3" style="font-size: 125%">
                </form>
            </div>
            <incidencias-component></incidencias-component>
        </div>
    </div>
@endsection
