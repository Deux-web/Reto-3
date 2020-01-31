<div class="col-12 bg-light my-1 rounded-sm p-3 form-group order-1 order-md-1" style="height: max-content">
    <div class="row mb-2">
        <div class="col-md-9 col-12 d-flex justify-content-between">
            <h1 class="d-inline-block">Datos de la incidencia</h1>
            <i id="botonDatosIncidencia"
               class="fas fa-arrow-down col-2 d-block d-md-none d-flex justify-content-center align-items-center"></i>
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
