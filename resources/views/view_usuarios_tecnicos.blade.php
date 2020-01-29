@extends('layout_html')
@section('head')
    <title>Todas las incidencias</title>
    <script src="{{URL::asset('js/app.js')}}"></script>
    <script src="{{URL::asset('js/registro.js')}}"></script>
@endsection
@section('contenido')
    <div>
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
                <table id="tabla_usuarios" class="mt-3 table table-striped table-hover pb-5 table-responsive-sm">
                    <thead class="bg-dark text-white">
                    <tr>
                        <th scope="col" id="th_cod">Cod. Usuario</th>
                        <th scope="col" id="th_nombre">Nombre</th>
                        <th scope="col" id="th_apellidos">Apellidos</th>
                        <th scope="col" id="th_email">Email</th>
                        <th scope="col" id="th_rol">Rol</th>
                        <th scope="col" id="th_habilitado">Habilitado</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($usuarios as $usuario)
                        <tr>
                            <td>{{$usuario->id}}</td>
                            <td>{{$usuario->name}}</td>
                            <td>{{$usuario->apellido_p}} {{$usuario->apellido_s}}</td>
                            <td>{{$usuario->email}}</td>
                            <td>{{$usuario->rol}}</td>
                            @if($usuario->habilitado==1)
                                <td>Si</td>
                            @else
                                <td>No</td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="tecnicos" role="tabpanel" aria-labelledby="tecnicos-tab">
                <table id="table_tecnicos" class="mt-3 table table-striped table-hover pb-5 table-responsive-sm">
                    <thead class="bg-dark text-white">
                    <tr>
                        <th scope="col" id="th_cod">Cod. Usuario</th>
                        <th scope="col" id="th_nombre">Nombre</th>
                        <th scope="col" id="th_apellidos">Apellidos</th>
                        <th scope="col" id="th_email">Email</th>
                        <th scope="col" id="th_telefono">Telefono</th>
                        <th scope="col" id="th_estado">Estado</th>
                        <th scope="col" id="th_habilitado">Habilitado</th>
                        <th scope="col" id="th_centro">Centro</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tecnicos as $tecnico)
                        <tr>
                            <td>{{$tecnico->id}}</td>
                            <td>{{$tecnico->nombre}}</td>
                            <td>{{$tecnico->apellido_p}} {{$tecnico->apellido_s}}</td>
                            <td>{{$tecnico->email}}</td>
                            <td>{{$tecnico->telefono}}</td>
                            <td>{{$tecnico->estado}}</td>
                            @if($tecnico->habilitado==1)
                                <td>Si</td>
                            @else
                                <td>No</td>
                            @endif
                            <td>{{$tecnico->centro->nombre}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="crearUsuario" role="tabpanel" aria-labelledby="crearUsuario-tab">
                @include('includes.crearUsuario')
            </div>
        </div>
    </div>

@endsection
