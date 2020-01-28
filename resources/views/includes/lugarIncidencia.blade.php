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
                if ($urbano_interurbano=='Interurbano'){
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
                    @if($urbano_interurbano=='Interurbano')
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
                @if($urbano_interurbano=='Interurbano')
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
