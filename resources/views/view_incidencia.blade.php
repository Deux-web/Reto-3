@extends('layout_html')
@section('head')
    <title>Inc. {{$incidencia->id}} - {{$incidencia->estado}} - {{$user->rol}}</title>
    <script src="{{URL::asset('js/app.js')}}"></script>
    <script src="{{URL::asset('js/incidencia.js')}}"></script>
    <link href="{{asset('css/mapa.css')}}" rel="stylesheet">
@endsection
@section('contenido')
    <div class="mx-auto row no-gutters container">
        <div class="col-12 bg-light my-1 rounded-sm p-3 form-group order-1 order-md-1" style="height: max-content">
            <div class="row mb-2">
                <div class="col-md-9 col-12 d-flex justify-content-between">
                    <h1 class="d-inline-block">Datos de la incidencia</h1>
                    <i id="botonDatosIncidencia" class="fas fa-arrow-down col-2 d-block d-md-none d-flex justify-content-center align-items-center"></i>
                </div>
                <div class="col-md-3 col-12 d-flex align-items-center justify-content-center">
                    @switch($incidencia->estado)
                        @case('PENDIENTE')
                        <a class="btn btn-primary px-5" href="">{{$incidencia->estado}}</a>
                        @break
                        @case('RESUELTA')
                        <a class="btn btn-secondary px-5" href="">{{$incidencia->estado}}</a>
                        @break
                        @default
                        <a class="w-100 btn btn-success px-5" href="">{{$incidencia->estado}}</a>
                    @endswitch
                </div>
            </div>
            <div id="datosIncidencia" class="colapsarDiv">
                <h3 class="mb-0"><label for="titulo">Título</label></h3>
                <input class="form-control mb-2" type="text" id="titulo" value="{{$incidencia->titulo}}" readonly>
                <h3 class="mb-0"><label for="descripcion">Descripción</label></h3>
                <textarea class="form-control mb-2" id="descripcion" style="resize: none"
                          readonly>{{$incidencia->descripcion}}</textarea>
                <h3 class="mb-0"><label for="tipo_incidente">Tipo de incidente</label></h3>
                <input type="text" name="tipo_incidente" id="tipo_incidente" class="form-control" readonly
                       value="{{$incidencia->tipo}}">
            </div>
        </div>
        <div class="col-12 bg-light my-1 rounded-sm p-3 form-group order-2" style="height: max-content">
            <div class="col-md-9 col-12 d-flex justify-content-between px-0">
                <h1>Datos del afectado</h1>
                <i id="botonDatosAfectados" class="fas fa-arrow-down col-2 d-block d-md-none d-flex justify-content-center align-items-center"></i>
            </div>
            <div class="row colapsarDiv" id="datosAfectado">
                <div class="col-lg-6 datosAfectado">
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
        @if($user->rol!=='TECNICO')
            <div class="col-lg-6 col-12 bg-light my-1 rounded-sm p-3 order-2" style="height: max-content">
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
            @if($tecnico !==null)
                <div class="col-lg-6 col-12 bg-light my-1 rounded-sm p-3 order-2" style="height: max-content">
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
            @else
                <div class="col-lg-6 col-12 bg-light my-1 rounded-sm p-3 order-2" style="height: max-content">
                    <p class="d-none" id="centro_id">{{$incidencia->id}}</p>
                    <table class="table table-striped table-hover col-lg-12" id="tablaTecnicos">
                        <thead class="bg-dark text-white">
                        <tr>
                            <th scope="col">Nombre y apellidos</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Seleccionar</th>
                        </tr>
                        </thead>
                        <tbody id="tbodyTecnicos">

                        </tbody>
                    </table>
                </div>
            @endif
        @elseif($incidencia->tecnico->email==$user->email)
            @if($incidencia->estado === 'ACTIVA')
                <div class="col-12 bg-light my-1 rounded-sm p-3 order-2" style="height: max-content">
                    <form action="{{route('incidencia.update',$incidencia->id)}}" method="POST">
                        @csrf
                        <input type="submit" class="btn btn-danger py-3 w-100 comentario" name="estado"
                               value="Voy de camino">
                    </form>
                </div>
            @elseif($incidencia->estado === 'PENDIENTE')
                <div class="col-12 bg-light my-1 rounded-sm p-3 order-2" style="height: max-content">
                    <form action="{{route('incidencia.update',$incidencia->id)}}" method="POST">
                        @csrf
                        <div class="col-md-9 col-12 d-flex justify-content-between px-0">
                            <h1>Tipo de resolución</h1>
                            <i id="botonDatosResolucion" class="fas fa-arrow-down col-2 d-block d-md-none d-flex justify-content-center align-items-center"></i>
                        </div>
                        <div class="tipoResolucion colapsarDiv">
                            <div class="d-flex justify-content-around mb-2">
                                <div>
                                    <h4 class="d-inline"><label for="rb_insitu">In situ</label></h4>
                                    <input type="radio" name="tipo_res" value="In situ" id="rb_insitu" checked>
                                </div>
                                <div>
                                    <h4 class="d-inline"><label for="rb_taller">Taller</label></h4>
                                    <input type="radio" name="tipo_res" value="Taller" id="rb_taller">
                                </div>
                            </div>
                            <div class="d-none form-group" id="res_taller">
                                <h4 class="mb-0"><label for="taller">Taller</label></h4>
                                <input type="text" name="taller" id="taller" class="form-control mb-1">
                                <h4 class="mb-0"><label for="textarea_res_taller">Mensaje de resolución</label></h4>
                                <textarea name="textarea_res_taller" id="textarea_res_taller" rows="4"
                                          class="form-control"
                                          style="resize: none;"
                                          placeholder="La incidencia ha sido resuelta..."></textarea>
                            </div>
                            <div class="d-none form-group" id="res_insitu">
                                <h4 class="mb-0"><label for="textarea_res_insitu">Mensaje de resolución</label></h4>
                                <textarea name="textarea_res_insitu" id="textarea_res_insitu" rows="4"
                                          class="form-control"
                                          style="resize: none;"
                                          placeholder="La incidencia ha sido resuelta..."></textarea>
                            </div>
                        </div>
                        <input type="submit" value="Resolver incidencia" class="btn btn-primary w-100">
                    </form>
                </div>
            @endif

        @endif
        @if($incidencia->estado=="RESUELTA")
            <div class="col-12 bg-light my-1 rounded-sm p-3 order-2" style="height: max-content">
                <div class="col-md-9 col-12 d-flex justify-content-between px-0">
                    <h1>Tipo de resolución</h1>
                    <i id="botonDatosResolucion" class="fas fa-arrow-down col-2 d-block d-md-none d-flex justify-content-center align-items-center"></i>
                </div>
                <div class="tipoResolucion colapsarDiv">
                    <div class="d-flex justify-content-around mb-2">
                        @if($incidencia->tipo_resolucion=='In situ')
                            <div>
                                <h4 class="d-inline"><label for="rb_insitu">In situ</label></h4>
                                <input type="radio" name="tipo_res" value="In situ" id="rb_insitu" checked disabled>
                            </div>
                            <div>
                                <h4 class="d-inline"><label for="rb_taller">Taller</label></h4>
                                <input type="radio" name="tipo_res" value="Taller" id="rb_taller" disabled>
                            </div>
                        @else
                            <div>
                                <h4 class="d-inline"><label for="rb_insitu">In situ</label></h4>
                                <input type="radio" name="tipo_res" value="In situ" id="rb_insitu" disabled>
                            </div>
                            <div>
                                <h4 class="d-inline"><label for="rb_taller">Taller</label></h4>
                                <input type="radio" name="tipo_res" value="Taller" id="rb_taller" checked disabled>
                            </div>
                        @endif
                    </div>
                    @if($incidencia->tipo_resolucion=='Taller')
                        @php
                            $mensaje_resolucion=explode(',',$incidencia->mensaje_resolucion);
                            $taller=$mensaje_resolucion[0];
                            $mensaje=$mensaje_resolucion[1];
                        @endphp
                        <div class="d-none form-group" id="res_taller">
                            <h4 class="mb-0"><label for="taller">Taller</label></h4>
                            <input type="text" name="taller" id="taller" class="form-control mb-1" value="{{$taller}}"
                                   readonly>
                            <h4 class="mb-0"><label for="textarea_res_taller">Mensaje de resolución</label></h4>
                            <textarea name="textarea_res_taller" id="textarea_res_taller" rows="4" class="form-control"
                                      style="resize: none;" placeholder="La incidencia ha sido resuelta..."
                                      readonly>{{$mensaje}}</textarea>
                        </div>
                    @else
                        <div class="d-none form-group" id="res_insitu">
                            <h4 class="mb-0"><label for="textarea_res_insitu">Mensaje de resolución</label></h4>
                            <textarea name="textarea_res_insitu" id="textarea_res_insitu" rows="4" class="form-control"
                                      style="resize: none;"
                                      placeholder="La incidencia ha sido resuelta..."
                                      readonly>{{$incidencia->mensaje_resolucion}}</textarea>
                        </div>
                    @endif
                </div>
            </div>
        @endif
        <div class="col-12 bg-light my-1 rounded-sm p-3 form-group order-1 order-md-2" style="height: max-content">
            <div class="row">
                <div class="col-lg-6 mt-3 d-flex justify-content-center" id="mapa">
                    <div id="floating-panel" class="d-none">
                        <input id="address" type="textbox" class="" value="">
                        <input id="submit" type="button" value="Buscar" class="btn btn-primary">
                    </div>
                    <div id="map"></div>
                </div>
                <div class="col-lg-6">
                    <h1>Lugar del incidente</h1>
                    @php
                        $lugar = explode(',',$incidencia->direccion);
                            $urbano_interurbano = $lugar[0];
                            $provincia = $lugar[1];
                        if (sizeof($lugar)>5){
                            $tipovia = $lugar[2];
                            $carretera = $lugar[3];
                            $km = $lugar[4];
                            $sentido = $lugar[5];
                            $proximidades = $lugar[6];
                        }
                        else{
                            $localidad = $lugar[2];
                            $calle = $lugar[3];
                            $numero = $lugar[4];
                        }
                    @endphp
                    <div class="row">
                        <div class="col-6 mb-2">
                            <h3 class="mb-0"><label for="urbano_interurbano">Zona</label></h3>
                            @if(sizeof($lugar)>5)
                                <input type="text" class="form-control" value="Interurbano" id="urbano_interurbano"
                                       disabled>
                            @else
                                <input type="text" class="form-control" value="Urbano" id="urbano_interurbano"
                                       disabled>
                            @endif
                        </div>
                        <div class="col-6 mb-2">
                            <h3 class="mb-0"><label for="provincia_m">Provincia</label></h3>
                            <input type="text" name="provincia_m" id="provincia_m" class="form-control"
                                   value="{{$provincia}}" disabled>
                        </div>
                        @if(sizeof($lugar)>5)
                            <div class="col-6 mb-2">
                                <h3 class="mb-0"><label for="tipo_via">Tipo de vía</label></h3>
                                <input type="text" name="tipo_via" id="tipo_via" class="form-control"
                                       value="{{$tipovia}}" disabled>
                            </div>
                            <div class="col-6 mb-2">
                                <h3 class="mb-0"><label for="carretera">Carretera</label></h3>
                                <input type="text" name="provincia_m" id="carretera" class="form-control"
                                       value="{{$carretera}}" disabled>
                            </div>
                            <div class="col-4 mb-2">
                                <h3 class="mb-0"><label for="km">KM</label></h3>
                                <input type="text" name="km" id="km" class="form-control" value="{{$km}}" disabled>
                            </div>
                            <div class="col-8 mb-2">
                                <h3 class="mb-0"><label for="proximidades">Proximidades</label></h3>
                                <input type="text" name="provincia_m" id="proximidades" class="form-control"
                                       value="{{$proximidades}}" disabled>
                            </div>
                        @else
                            <div class="col-4 mb-2">
                                <h3 class="mb-0"><label for="localidad">Localidad</label></h3>
                                <input type="text" name="localidad" id="localidad" class="form-control"
                                       value="{{$localidad}}" disabled>
                            </div>
                            <div class="col-8 mb-2">
                                <h3 class="mb-0"><label for="direccion">Dirección</label></h3>
                                <input type="text" name="direccion" id="direccion" class="form-control"
                                       value="{{$calle . ' ' . $numero}}" disabled>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 bg-light my-1 rounded-sm p-3 form-group order-4 order-md-3" style="height: max-content">
            <div class="col-md-9 col-12 d-flex justify-content-between px-0">
                <h1 class="mb-0">Comentarios</h1>
                <i id="botonDatosComentarios" class="fas fa-arrow-down col-2 d-block d-md-none d-flex justify-content-center align-items-center"></i>
            </div>
            <div id="datosComentarios" class="colapsarDiv">
                <form action="{{route('comentario.store', $incidencia->id)}}" method="POST" class="mb-3">
                    @csrf
                    <h4><label for="comentario_nuevo">Nuevo comentario: </label></h4>
                    <div class="row">
                        <div class="col-md-9 col-12 mb-2 mb-md-0">
                        <textarea name="comentario_nuevo" id="comentario_nuevo" rows="3" class="form-control"
                                  style="resize: none;"></textarea>
                        </div>
                        <div class="col-md-3 col-12 d-flex align-items-start justify-content-center">
                            <input type="submit" value="Guardar comentario"
                                   class="btn btn-primary py-md-3 w-md-auto w-100">
                        </div>
                    </div>
                </form>

                @forelse($comentarios as $comentario)
                    <div class="px-3 py-1 border rounded-sm bg-white mb-1">
                        <div class="row">
                            <div class="col-12 py-2">
                                <h5 class="d-inline">Comentario de {{$comentario->autor}}</h5>
                                <p class="d-inline float-right">{{$comentario->created_at}}</p>
                                <p class="comentario mb-1">{{$comentario->mensaje}}</p>
                                <span class="float-right text-secondary"></span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div>
                        <div class="col-12 py-2 row">
                            <h5>No hay comentarios !</h5>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
