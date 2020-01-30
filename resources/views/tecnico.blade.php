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
            <h2>Datos del técnico {{$tecnico->nombre}}</h2>
        </div>

        <div class="row">
            <div class="col-md-12 order-md-1">
                <div class="mb-3">
                    <label>Nombre del técnico</label>
                    <div class="input-group">
                        <input type="text" class="form-control" value="{{$tecnico->nombre}}" readonly>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Primer apellido</label>
                        <input type="text" class="form-control" value="{{$tecnico->apellido_p}}" readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Segundo apellido</label>
                        <input type="text" class="form-control" value="{{$tecnico->apellido_s}}" readonly>
                    </div>
                </div>

                <div class="col-md-12 order-md-1">
                    <div class="row">
                        <div class="col-md-6 mb-3 px-0 pl-md-0 pr-md-3">
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" class="form-control" value="{{$tecnico->email}}" readonly>
                            </div>

                            <div class="mb-3">
                                <label>Teléfono</label>
                                <input type="text" class="form-control" value="{{$tecnico->telefono}}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3 px-0 pr-md-0 pl-md-3">
                            <div class="mb-3">
                                <label>Estado</label>
                                <input type="text" class="form-control" value="{{$tecnico->estado}}" readonly>
                            </div>

                            <div class="mb-3">
                                <label>Habilitado</label>
                                @if($tecnico->habilitado==1)
                                    <input type="text" class="form-control" value="Habilitado" readonly>
                                @else
                                    <input type="text" class="form-control" value="No habilitado" readonly>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label>Nombre del centro</label>
                    <div class="input-group">
                        <input type="text" class="form-control" value="{{$tecnico->centro->nombre}}" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
