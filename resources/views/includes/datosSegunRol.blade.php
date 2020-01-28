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
            <p class="d-none" id="centro_id">{{$centro->id}}</p>
            <form method="post" action="{{route('incidencia.tecnico',$incidencia->id)}}">
                <table class="table table-striped table-hover col-lg-12" id="tablaTecnicos">

                    @csrf
                    <thead class="bg-dark text-white">
                    <tr>
                        <th scope="col">Nombre y apellidos</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Seleccionar</th>
                    </tr>
                    </thead>
                    <tbody id="tbodyTecnicos">

                    </tbody>
                    <input type="submit" value="Asignar Tecnico">

                </table>
            </form>
        </div>
    @endif
    <!-------------------------ACCION DEPENDIENDO DEL ESTADO DE LA INCIDENCIA---------------------------->
@elseif($incidencia->tecnico->email==$user->email)
    <!--------------------------ACTIVA (solo lo ve el tecnico asignado)-------------------------->
    @if($incidencia->estado === 'ACTIVA')
        <div class="col-12 bg-light my-1 rounded-sm p-3 order-2" style="height: max-content">
            <form action="{{route('incidencia.update',$incidencia->id)}}" method="POST">
                @csrf
                <input type="submit" class="btn btn-danger py-3 w-100 comentario" name="estado"
                       value="Voy de camino">
            </form>
        </div>
        <!--------------------------PENDIENTE (solo lo ve el tecnico asignado)-------------------------->
    @elseif($incidencia->estado === 'PENDIENTE')
        <div class="col-12 bg-light my-1 rounded-sm p-3 order-2" style="height: max-content">
            <form action="{{route('incidencia.update',$incidencia->id)}}" method="POST">
                @csrf
                <div class="col-md-9 col-12 d-flex justify-content-between px-0">
                    <h1>Tipo de resolución</h1>
                    <i id="botonDatosResolucion"
                       class="fas fa-arrow-down col-2 d-block d-md-none d-flex justify-content-center align-items-center"></i>
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
