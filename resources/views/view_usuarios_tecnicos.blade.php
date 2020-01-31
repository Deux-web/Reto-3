@extends('layout_html')
@section('head')
    <title>Gestión de usuarios</title>
    <script src="{{URL::asset('js/usuarios.js')}}"></script>
    <script src="{{URL::asset('js/app.js')}}"></script>
@endsection
@section('contenido')
    <div id="app" class="mt-1 mx-1">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="usuarios-tab" data-toggle="tab" href="#usuarios" role="tab"
                   aria-controls="usuarios"
                   aria-selected="true">Usuarios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tecnicos-tab" data-toggle="tab" href="#tecnicos" role="tab"
                   aria-controls="tecnicos"
                   aria-selected="false">Técnicos</a>
            </li>
            @if($user->rol === 'GERENTE' || $user->rol === 'COORDINADOR')
                <li class="nav-item">
                    <a class="nav-link" id="crearUsuario-tab" data-toggle="tab" href="#crearUsuario" role="tab"
                       aria-controls="crearUsuario"
                       aria-selected="false">Crear Usuario</a>
                </li>
            @endif
        </ul>
        <div class="tab-content" id="tablesContent">
            <div class="tab-pane fade show active" id="usuarios" role="tabpanel" aria-labelledby="usuarios-tab">
                <usuarios-component></usuarios-component>
            </div>
            <div class="tab-pane fade" id="tecnicos" role="tabpanel" aria-labelledby="tecnicos-tab">
                <tecnicos-component></tecnicos-component>
            </div>
            @if($user->rol === 'GERENTE' || $user->rol === 'COORDINADOR')
                <div class="tab-pane fade" id="crearUsuario" role="tabpanel" aria-labelledby="crearUsuario-tab">
                    @include('includes.crearUsuario')

                </div>
            @endif
        </div>
    </div>
@endsection
