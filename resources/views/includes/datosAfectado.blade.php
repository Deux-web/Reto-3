<div class="col-12 bg-light my-1 rounded-sm p-3 form-group order-2" style="height: max-content">
    <div class="col-md-9 col-12 d-flex justify-content-between px-0">
        <h1>Datos del afectado</h1>
        <i id="botonDatosAfectados"
           class="fas fa-arrow-down col-2 d-block d-md-none d-flex justify-content-center align-items-center"></i>
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
