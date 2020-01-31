@extends('layout_html')

@section('head')
    <title>Datos Centro</title>
    <script src="{{URL::asset('js/app.js')}}"></script>
    <script src="{{URL::asset('js/crear_incidencia.js')}}"></script>
@endsection
@section('contenido')
    <div class="container">
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="{{asset('images/road-tech-assistance.png')}}">
            <h2>Datos del centro {{$centro->nombre}}</h2>
        </div>

        <div class="row">
            <div class="col-md-12 order-md-1">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Nombre del centro</label>
                        <input type="text" class="form-control" value="{{$centro->nombre}}" readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Provincia</label>
                        <input type="text" class="form-control" value="{{$centro->provincia}}" readonly>
                    </div>
                </div>

                <div class="mb-3">
                    <label>Dirección</label>
                    <div class="input-group">
                        <input type="text" class="form-control" value="{{$centro->direccion}}" readonly>
                    </div>
                </div>
                <div class="col-md-12 order-md-1">
                    <div class="row">
                        <div class="col-md-6 mb-3 px-0 pl-md-0 pr-md-3">
                            <div class="mb-3">
                                <label>Persona de Contacto</label>
                                <input type="email" class="form-control" value="{{$centro->persona_contacto}}" readonly>
                            </div>

                            <div class="mb-3">
                                <label>Teléfono</label>
                                <input type="text" class="form-control" value="{{$centro->telefono}}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3 px-0 pr-md-0 pl-md-3">
                            <div class="mb-3">
                                <label>Horario</label>
                                <input type="text" class="form-control" value="{{$centro->horario}}" readonly>
                            </div>

                            <div class="mb-3">
                                <label>Email</label>
                                <input type="text" class="form-control" value="{{$centro->email}}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
