@extends('layout_html')
@section('head')
    <title>Incidencia {{$incidencia->id}} - {{$incidencia->estado}} - {{$user->rol}}</title>
@endsection
@section('contenido')
    <form action="">
        <div class="m-lg-3 m-2 row no-gutters">
            <div class="col-12 bg-light my-1 rounded-sm p-3 form-group" style="height: max-content">
                <h1 class="d-inline-block">Datos de la incidencia</h1>
                @switch($incidencia->estado)
                    @case('PENDIENTE')
                    <a class="float-right btn btn-primary px-5" href="">{{$incidencia->estado}}</a>
                    @break
                    @case('RESUELTA')
                    <a class="float-right btn btn-secondary px-5" href="">{{$incidencia->estado}}</a>
                    @break
                    @default
                    <a class="float-right btn btn-success px-5" href="">{{$incidencia->estado}}</a>
                @endswitch
                <h3 class="mb-0"><label for="titulo">Título</label></h3>
                <input class="form-control mb-2" type="text" id="titulo" value="{{$incidencia->titulo}}" readonly>
                <h3 class="mb-0"><label for="descripcion">Descripción</label></h3>
                <input class="form-control mb-2" type="text" id="descripcion" value="{{$incidencia->descripcion}}"
                       readonly>
            </div>
            <div class="col-12 bg-light my-1 rounded-sm p-3 form-group" style="height: max-content">
                <div class="row">
                    <h1 class="col-12">Datos del afectado</h1>
                    <div class="col-lg-6">
                        <h3 class="mb-0"><label for="nom_ap">Nombre y apellidos</label></h3>
                        <input class="form-control mb-2" type="text" id="nom_ap"
                               value="{{$conductor->nombre . ' ' . $conductor->apellido_p . ' ' .$conductor->apellido_s}}"
                               readonly>
                    </div>
                    <div class="col-lg-4">
                        <h3 class="mb-0"><label for="estado_conductor">Estado del conductor</label></h3>
                        <input class="form-control mb-2" type="text" id="estado_conductor"
                               value="{{$incidencia->estado_conductor}}"
                               readonly>
                    </div>
                    <div class="col-lg-2">
                        <h3 class="mb-0"><label for="taxi">Taxi</label></h3>
                        @if($incidencia->taxi ===1)
                            <input class="form-control" type="text" name="taxi" id="taxi" value="Requiere taxi"
                                   disabled>
                        @else
                            <input class="form-control" type="text" name="taxi" id="taxi" value="No requiere taxi"
                                   disabled>
                        @endif
                    </div>
                    <div class="col-lg-6">
                        <h3 class="mb-0"><label for="telefono">Teléfono</label></h3>
                        <input class="form-control mb-2" type="text" id="telefono" value="{{$conductor->telefono}}"
                               readonly>
                    </div>
                    <div class="col-lg-6">
                        <h3 class="mb-0"><label for="contacto">E-Mail</label></h3>
                        <input class="form-control mb-2" type="text" id="contacto" value="{{$conductor->email}}"
                               readonly>
                    </div>
                </div>
            </div>
            <div class="col-6 bg-light my-1 rounded-sm p-3" style="height: max-content">
                <div class="row">
                    <div class="col-9">
                        <h1>Datos del centro</h1></div>
                    <div class="col-3">
                        <a href="#" class="btn btn-secondary d-flex align-items-center justify-content-center">Ver
                            más</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <h3 class="mb-0"><label for="centro">Nombre del centro</label></h3>
                        <input class="form-control" type="text" name="centro" id="centro" value="{{$centro->nombre}}"
                               readonly>
                    </div>
                    <div class="col-lg-6">
                        <h3 class="mb-0"><label for="provincia">Provincia</label></h3>
                        <input class="form-control" type="text" name="provincia" id="provincia"
                               value="{{$centro->provincia}}" readonly>
                    </div>
                </div>

            </div>
            <div class="col-6 bg-light my-1 rounded-sm p-3" style="height: max-content">
                <div class="row">
                    <div class="col-9">
                        <h1>Datos del técnico</h1></div>
                    <div class="col-3">
                        <a href="#" class="btn btn-secondary d-flex align-items-center justify-content-center">Ver
                            más</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <h3 class="mb-0"><label for="nombre_t">Nombre del técnico</label></h3>
                        <input class="form-control" type="text" name="nombre_t" id="nombre_t"
                               value="{{$tecnico->nombre . ' ' . $tecnico->apellido_p}}"
                               readonly>
                    </div>
                    <div class="col-lg-6">
                        <h3 class="mb-0"><label for="telefono_t">Teléfono</label></h3>
                        <input class="form-control" type="text" name="telefono_t" id="telefono_t"
                               value="{{$tecnico->telefono}}" readonly>
                    </div>
                </div>
            </div>
            <div class="col-12 bg-light my-1 rounded-sm p-3 form-group" style="height: max-content">
                <div class="row">
                    <div class="col-lg-6">
                        <img src="{{URL::asset('images/mapa_ejemplo.png')}}" alt="" width="100%">
                    </div>
                    <div class="col-lg-6">
                        <h1>Lugar del incidente</h1>
                        @php
                            $lugar = explode(',',$incidencia->direccion);
                            $urbano_interurbano = $lugar[0];
                            $provincia = $lugar[1];
                            $tipovia = $lugar[2];
                            $carretera = $lugar[3];
                            $km = $lugar[4];
                            $sentido = $lugar[5];
                            $proximidades = $lugar[6];
                        @endphp
                        <div class="row">
                            <div class="col-6 mb-2">
                                <h3 class="mb-0"><label for="urbano_interurbano">Zona</label></h3>
                                @if($urbano_interurbano == 'iu')
                                    <input type="text" class="form-control" value="Interurbano" id="urbano_interurbano" disabled>
                                @else
                                    <input type="text" class="form-control" value="Urbano" id="urbano_interurbano" disabled>
                                @endif
                            </div>
                            <div class="col-6 mb-2">
                                <h3 class="mb-0"><label for="provincia_m">Provincia</label></h3>
                                <input type="text" name="provincia_m" id="provincia_m" class="form-control" value="{{$provincia}}" disabled>
                            </div>
                            <div class="col-6 mb-2">
                                <h3 class="mb-0"><label for="tipo_via">Tipo de vía</label></h3>
                                <input type="text" name="tipo_via" id="tipo_via" class="form-control" value="{{$tipovia}}" disabled>
                            </div>
                            <div class="col-6 mb-2">
                                <h3 class="mb-0"><label for="carretera">Carretera</label></h3>
                                <input type="text" name="provincia_m" id="carretera" class="form-control" value="{{$carretera}}" disabled>
                            </div>
                            <div class="col-4 mb-2">
                                <h3 class="mb-0"><label for="km">KM</label></h3>
                                <input type="text" name="km" id="km" class="form-control" value="{{$km}}" disabled>
                            </div>
                            <div class="col-8 mb-2">
                                <h3 class="mb-0"><label for="proximidades">Proximidades</label></h3>
                                <input type="text" name="provincia_m" id="proximidades" class="form-control" value="{{$proximidades}}" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
