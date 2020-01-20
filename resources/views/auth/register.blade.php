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
                    <form method="POST" action="{{ route('register') }}" id="form_registro">
                        @csrf

                        <div class="form-group row">
                            <label for="tipo_usuario" class="col-md-4 col-form-label text-md-right">Tipo de usuario</label>

                            <div class="col-md-6">
                                <select class="form-control" id="tipo_usuario">
                                    <option disabled selected> -- Seleccione un tipo de usuario -- </option>
                                    <option value="operador"> Operador</option>
                                    <option value="tecnico"> Técnico</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required  autofocus>

                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="apellido" class="col-md-4 col-form-label text-md-right">Apellido 1</label>

                            <div class="col-md-6">
                                <input id="apellido" type="text" class="form-control @error('apellido') is-invalid @enderror" name="apellido" value="{{ old('apellido') }}" required  autofocus>

                                @error('apellido')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="apellido2" class="col-md-4 col-form-label text-md-right">Apellido 2</label>

                            <div class="col-md-6">
                                <input id="apellido2" type="text" class="form-control @error('apellido2') is-invalid @enderror" name="apellido2" value="{{ old('apellido2') }}" required  autofocus>

                                @error('apellido2')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="tecnico d-none">
                            <div class="form-group row  ">
                                <label for="telefono" class="col-md-4 col-form-label text-md-right">Teléfono</label>

                                <div class="col-md-6">
                                    <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required  autofocus>

                                    @error('telefono')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="provincia" class="col-md-4 col-form-label text-md-right">Provincia</label>

                                <div class="col-md-6">
                                    <select class="form-control" id="provincia">
                                        <option disabled selected> -- Seleccione una provincia -- </option>
                                        <option>Álava</option>
                                        <option>Gipuzcoa</option>
                                        <option>Vizcaya</option>
                                        <option>Navarra</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row ">
                                <label for="centro" class="col-md-4 col-form-label text-md-right">Centro</label>

                                <div class="col-md-6">
                                    <select class="form-control" id="centro">
                                        <option disabled selected> -- Seleccione un centro -- </option>
                                        <option class="araba" value="Agurain">Agurain</option>
                                        <option class="bizkaia" value="Basauri">Basauri</option>
                                        <option class="bizkaia" value="Durango">Durango</option>
                                        <option class="gipuzkoa" value="Usurbil">Usurbil</option>
                                        <option class="gipuzkoa" value="Azkoitia">Azkoitia</option>
                                        <option class="navarra"  value="Baranyain">Baranyain</option>
                                        <option class="navarra" value="Tafalla">Tafalla</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-0 flex justify-content-around">


                            <div class="col-md-6 offset-md-4">
                                <input id="limpiar_form" type="reset" class="btn btn-primary" name="limpiar_form">
                                <button type="submit" class="btn btn-primary" id="crear"> Crear</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
