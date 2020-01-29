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
                                <select name="rol" class="form-control" id="rol" autofocus>
                                    <option disabled selected> - Seleccione un tipo de usuario -</option>
                                    <option value="OPERADOR">Operador</option>
                                    <option value="TECNICO">Técnico</option>
                                    @if(Auth::user()->rol === 'GERENTE')
                                        <option value="COORDINADOR">Coordinador</option>
                                        <option value="GERENTE">Gerente</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" required
                                       autofocus>
                                <div id="texto_name" class="form-control-feedback text-danger d-none">Nombre
                                    no
                                    válido
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="apellido" class="col-md-4 col-form-label text-md-right">Apellido
                                1</label>
                            <div class="col-md-6">
                                <input id="apellido" type="text"
                                       class="form-control" name="apellido_p" required autofocus>
                                <div id="texto_apellido_p" class="form-control-feedback text-danger d-none">
                                    Apellido
                                    no válido
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="apellido2" class="col-md-4 col-form-label text-md-right">Apellido
                                2</label>
                            <div class="col-md-6">
                                <input id="apellido2" type="text"
                                       class="form-control" name="apellido_s" required autofocus>
                                <div id="texto_apellido_s" class="form-control-feedback text-danger d-none">
                                    Apellido
                                    no válido
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                            <div class="col-md-6">
                                <input id="email" type="email"
                                       class="form-control" name="email" required>
                                <div id="texto_email" class="form-control-feedback text-danger d-none">Email
                                    no
                                    válido
                                </div>
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
                                <div id="texto_pass" class="form-control-feedback text-danger d-none">Las
                                    contraseñas no coinciden
                                </div>
                            </div>
                        </div>
                        <div class="tecnico d-none">
                            <div class="form-group row ">
                                <label for="telefono"
                                       class="col-md-4 col-form-label text-md-right">Teléfono</label>
                                <div class="col-md-6">
                                    <input id="telefono" type="text"
                                           class="form-control" name="telefono" autofocus>
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label for="centro"
                                       class="col-md-4 col-form-label text-md-right">Centro</label>
                                <div class="col-md-6">
                                    <select class="form-control" id="centro" name="centro">
                                        <option disabled selected>- Seleccione un centro -</option>
                                        @foreach($centros as $centro)
                                            <option value="{{$centro->id}}">{{$centro->nombre}}</option>
                                        @endforeach
                                    </select>
                                    <div id="texto_centro" class="form-control-feedback text-danger d-none">
                                        Seleccione un centro
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-0 flex justify-content-around">
                            <div class="col-md-6 offset-md-4">
                                <input id="limpiar_form" type="reset" class="btn btn-primary"
                                       name="limpiar_form"
                                       onclick="validarFormulario();">
                                <input type="submit" class="btn btn-primary" id="crear"
                                       value="Crear Usuario">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
