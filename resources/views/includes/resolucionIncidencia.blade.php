@if($incidencia->estado=="RESUELTA")
    <div class="col-12 bg-light my-1 rounded-sm p-3 order-2" style="height: max-content">
        <div class="col-md-9 col-12 d-flex justify-content-between px-0">
            <h1>Tipo de resolución</h1>
            <i id="botonDatosResolucion"
               class="fas fa-arrow-down col-2 d-block d-md-none d-flex justify-content-center align-items-center"></i>
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
