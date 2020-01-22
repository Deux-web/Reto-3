@extends('layout_html')
@section('head')
    <title>Todas las incidencias</title>

@endsection
@section('contenido')
    <div>
        <div class="mt-2 row ml-2 mr-2">
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
        <div id="app">
            <incidencias-component></incidencias-component>
        </div>
    </div>
@endsection
