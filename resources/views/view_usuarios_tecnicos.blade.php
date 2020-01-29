@extends('layout_html')
@section('head')
    <title>Todas las incidencias</title>
    <script src="{{URL::asset('js/app.js')}}"></script>
    <script src="{{URL::asset('js/registro.js')}}"></script>
@endsection
@section('contenido')
    <div id="app">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="usuarios-tab" data-toggle="tab" href="#usuarios" role="tab"
                   aria-controls="usuarios"
                   aria-selected="true">Usuarios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tecnicos-tab" data-toggle="tab" href="#tecnicos" role="tab"
                   aria-controls="tecnicos"
                   aria-selected="false">Tecnicos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="crearUsuario-tab" data-toggle="tab" href="#crearUsuario" role="tab"
                   aria-controls="crearUsuario"
                   aria-selected="false">CrearUsuario</a>
            </li>
        </ul>
        <div class="tab-content" id="tablesContent">
            <div class="tab-pane fade show active" id="usuarios" role="tabpanel" aria-labelledby="usuarios-tab">
                <usuarios-component></usuarios-component>
            </div>
            <div class="tab-pane fade" id="tecnicos" role="tabpanel" aria-labelledby="tecnicos-tab">
                <tecnicos-component></tecnicos-component>
            </div>
            <div class="tab-pane fade" id="crearUsuario" role="tabpanel" aria-labelledby="crearUsuario-tab">
                @include('includes.crearUsuario')
            </div>
        </div>
    </div>

@endsection
