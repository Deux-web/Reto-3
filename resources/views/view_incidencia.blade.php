@extends('layout_html')
@section('head')
    <title>Inc. {{$incidencia->id}} - {{$incidencia->estado}} - {{$user->rol}}</title>
    <script src="{{URL::asset('js/app.js')}}"></script>
    <script src="{{URL::asset('js/incidencia.js')}}"></script>
    <link href="{{asset('css/mapa.css')}}" rel="stylesheet">
@endsection
@section('contenido')
    <div class="mx-auto row no-gutters container">
        @include('includes.datosIncidencia')
        @include('includes.datosAfectado')
        @include('includes.datosSegunRol')
        @include('includes.resolucionIncidencia')
        @include('includes.lugarIncidencia')
        @include('includes.comentarios')
    </div>
@endsection
