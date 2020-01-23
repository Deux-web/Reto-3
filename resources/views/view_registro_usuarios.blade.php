@extends('layout_html')
@section('head')
    <title>Crear usuario</title>
    <script src="{{URL::asset('js/app.js')}}"></script>
    <script src="{{URL::asset('js/registro.js')}}"></script>
@endsection
@section('contenido')
    <div class="container">

        <div class="row justify-content-center m-lg-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="row">
                        <h3 class="col-12 text-center mt-2">Creación de usuario</h3>
                    </div>


                    <div class="card-body">
                        <form method="POST" action="{{ route('usuario.store') }}" id="form_registro">
                            @csrf

                            <div class="form-group row">
                                <label for="tipo_usuario" class="col-md-4 col-form-label text-md-right">Tipo de
                                    usuario</label>

                                <div class="col-md-6">
                                    <select name="rol" class="form-control" id="tipo_usuario">
                                        <option disabled selected> - Seleccione un tipo de usuario -</option>
                                        <option value="OPERADOR"> Operador</option>
                                        <option value="TECNICO"> Técnico</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre</label>

                                <div class="col-md-6">
                                    <input id="nombre" type="text"
                                           class="form-control" name="nombre"
                                           required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="apellido" class="col-md-4 col-form-label text-md-right">Apellido 1</label>

                                <div class="col-md-6">
                                    <input id="apellido" type="text"
                                           class="form-control" name="apellido_p" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="apellido2" class="col-md-4 col-form-label text-md-right">Apellido 2</label>

                                <div class="col-md-6">
                                    <input id="apellido2" type="text"
                                           class="form-control" name="apellido_s" required autofocus>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control" name="email" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control" name="password" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required>
                                </div>
                            </div>
                            <div class="tecnico d-none">
                                <div class="form-group row ">
                                    <label for="telefono" class="col-md-4 col-form-label text-md-right">Teléfono</label>

                                    <div class="col-md-6">
                                        <input id="telefono" type="text"
                                               class="form-control" name="telefono" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label for="centro" class="col-md-4 col-form-label text-md-right">Centro</label>

                                    <div class="col-md-6">
                                        <select class="form-control" id="centro">
                                            <option disabled selected>- Seleccione un centro -</option>
                                            @foreach($centros as $centro)
                                                <option value="{{$centro->id}}">{{$centro->id}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-0 flex justify-content-around">


                                <div class="col-md-6 offset-md-4">
                                    <input id="limpiar_form" type="reset" class="btn btn-primary" name="limpiar_form">
                                    <input type="submit" class="btn btn-primary" id="crear" value="Crear Usuario">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
