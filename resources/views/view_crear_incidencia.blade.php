@extends('layout_html')
@section('head')
    <title>Crear incidencia</title>
    <script src="{{URL::asset('js/app.js')}}"></script>
    <script src="{{URL::asset('js/crear_incidencia.js')}}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{asset('css/mapa.css')}}" rel="stylesheet">
@endsection
@section('contenido')
    <div>
        <form action="{{route('incidencia.store')}}" method="post" class="m-lg-5 m-3">
            @csrf
            <div class="form-group row no-gutters">
                <div class="col-lg-4 col-6">
                    <h3><label for="matricula">Matrícula</label></h3>
                    <div class="form-group row no-gutters">
                        <input type="text" class="form-control p-1 col-6" id="matricula" maxlength="9"
                               placeholder="0000-NNN ó NN-0000-N" required>
                        <input type="button" class="btn btn-primary ml-3 "  id="buscarConductor" value="Comprobar">
                    </div>
                </div>
                <div class="col-lg-3 col-5">
                    <h3><label for="tipoaveria">Tipo de avería</label></h3>
                    <select name="tipoaveria" id="tipoaveria" class="form-control" required>
                        <option disabled selected>Seleccione tipo de avería</option>
                        <option value="fallo_coche">Fallo del coche</option>
                        <option value="pinchazo">Pinchazo</option>
                        <option value="golpe">golpe</option>
                        <option value="otros">Otros</option>
                    </select>
                </div>
                <div id="esp_otros" class="d-none col-lg-3 ml-3">
                    <h3><label for="otros">Especifica avería</label></h3>
                    <input type="text" name="" id="otros" class="form-control p-1">
                </div>
            </div>
            <div class="form-group row no-gutters">
                <h3 class="mb-0 col-12">Titular y conductores habituales</h3>
                <table class="table table-striped table-hover col-lg-8">
                    <thead class="bg-dark text-white">
                    <tr>
                        <th scope="col">DNI</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Titular</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Afectado</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>72852975S</td>
                        <td>Jon</td>
                        <td>Santos Barata</td>
                        <td>Sí</td>
                        <td>688844408</td>
                        <td><input type="radio" name="afectado"></td>
                    </tr>
                    <tr>
                        <td>72852976Q</td>
                        <td>Amaia</td>
                        <td>Santos Barata</td>
                        <td>No</td>
                        <td>666555888</td>
                        <td><input type="radio" name="afectado"></td>
                    </tr>
                    </tbody>
                </table>
                <div class="ml-lg-4 col-lg-2 d-none d-lg-block">
                    <img class="rounded-lg"
                         src="https://www.actualidadmotor.com/wp-content/uploads/2019/03/fiat-multipla-techo-830x460.jpg"
                         alt="" width="100%">
                </div>
            </div>
            <div class="form-group row no-gutters">
                <h3 class="col-12 mb-0"><label for="titulo">Título:</label></h3>
                <input type="text" name="titulo" id="titulo" class="form-control col-lg-5 col-md-8 p-1" required>
                <h3 class="col-12 mb-0 mt-2"><label for="descripcion">Descripción</label></h3>
                <textarea name="descripcion" id="descripcion" class="form-control col-lg-10 p-1" rows="3"
                          style="resize: none"></textarea>
            </div>
            <div class="form-group row no-gutters">
                <div class="col-lg-8 col-12 mb-2 mb-lg-0">
                    <h4 class="d-inline mr-3"><label for="estado_conductor">Estado del conductor</label></h4>
                    <select name="estado_conductor" id="estado_conductor" class="form-control w-lg-auto d-inline col-5">
                        <option disabled selected>Seleccione una opción</option>
                        <option value="bien">Bien</option>
                        <option value="nervioso">Nervioso</option>
                        <option value="medico">Requiere atención médica</option>
                        <option value="medico_ya">Requiere atención médica URGENTE</option>
                    </select>
                </div>
                <div class="col-lg-4 col-12">
                    <h4 class="d-inline"><label for="rb_urbano" class="ml-lg-5 mt-1 mt-lg-0">Urbano</label></h4>
                    <input class="ml-2 mr-2" type="radio" name="zona" id="rb_urbano">
                    <h4 class="d-inline">/</h4>
                    <input class="ml-2 mr-2" type="radio" name="zona" id="rb_interurbano" checked>
                    <h4 class="d-inline"><label for="rb_interurbano">Interurbano</label></h4>
                </div>
            </div>
            <div class="form-group row no-gutters p-3" style="border: 1px solid #7e7e7e">
                <div class="col-lg-6">
                    <label for="provincia" class="col-12 mr-3 pl-1"><strong>Provincia</strong></label>
                    <select name="provincia" id="provincia" class="col-10 pr-3 form-control mr-3 my-1">
                        <option disabled selected>Seleccione provincia</option>
                        <option value="araba">Araba</option>
                        <option value="bizkaia">Bizkaia</option>
                        <option value="gipuzkoa">Gipuzkoa</option>
                        <option value="nafarroa">Nafarroa</option>
                    </select>
                    <div class="" id="div_interurbanoInputs">
                        <label for="tipovia" class="col-12 mr-3 pl-1"><strong>Tipo de vía</strong></label>
                        <select name="tipovia" id="tipovia" class="pr-3 form-control col-lg-10 col-12 mr-3 my-1">
                            <option disabled selected>Seleccione tipo de vía</option>
                            <option value="autopista">Autopista</option>
                            <option value="autovia">Autovía</option>
                            <option value="interes_general">Interes general</option>
                            <option value="autonomica">Autonómicas</option>
                            <option value="complementaria">Complementaria</option>
                            <option value="comarcal">Comarcal</option>
                        </select>
                        <div class="col-12 row">
                            <label for="carretera" class="col-5 pl-1"><strong>Carretera</strong></label>
                            <label for="km" class="col-5 pl-1"><strong>KM</strong></label>
                            <input type="text" name="" id="carretera" class="form-control col-4 p-1 my-1"
                                   placeholder="Carretera">
                            <input type="number" name="" id="km" class="form-control col-4 p-1 my-1 offset-1"
                                   placeholder="KM">
                        </div>

                        <div class="row no-gutters">
                            <label for="direccion_sentido" class="col-12 pl-1"><strong>Dirección /
                                    Sentido</strong></label>
                            <input type="text" id="direccion_sentido" class="form-control col-lg-10 col-12 p-1 my-1">
                            <label for="proximidad" class="col-12"><strong>Proximidad</strong></label>
                            <input type="text" name="proximidad" id="proximidad"
                                   class="form-control col-lg-10 col-12 p-1 my-1">
                        </div>
                    </div>
                    <div class="" id="div_urbanoInputs">
                        <label for="localidad" class="col-12 mr-3 pl-1"><strong>Localidad</strong></label>
                        <input type="text" name="localidad" id="localidad" class="form-control col-10">
                        <label for="calle"><strong>Calle</strong></label>
                        <input type="text" name="calle" id="calle" class="form-control col-10">
                        <label for="portal"><strong>Portal</strong></label>
                        <input type="text" name="portal" id="portal" class="form-control col-10">
                    </div>
                </div>
                <div class="col-lg-6 mt-3 d-flex justify-content-center" id="mapa">
                    <div id="floating-panel" class="d-none d-lg-block">
                        <input id="address" type="textbox" class="" value="">
                        <input id="submit" type="button" value="Buscar" class="btn btn-primary">
                    </div>
                    <div id="map"></div>
                </div>
            </div>
            <div class="form-group row no-gutters">
                <div class="col-lg-6">
                    <div class="row no-gutters">
                        <h3 class="col-12"><label for="centro">Centro</label></h3>
                        <select name="centro" id="centro" class="form-control col-10 mb-2 mb-lg-0">
                            <option value="agurain">Agurain</option>
                            <option value="basauri">Basauri</option>
                            <option value="basauri">Durango</option>
                            <option value="basauri">Usurbil</option>
                            <option value="basauri">Azkoitia</option>
                            <option value="basauri">Baranyain</option>
                            <option value="basauri">Tafalla</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <table class="table table-striped table-hover col-lg-12">
                        <thead class="bg-dark text-white">
                        <tr>
                            <th scope="col">Nombre y apellidos</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Seleccionar</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Javier Alcalde</td>
                            <td>Libre</td>
                            <td><input type="radio" name="tecnico" id="t1"></td>
                        <tr>
                            <td>Daniel Sevilla</td>
                            <td>Libre</td>
                            <td><input type="radio" name="tecnico" id="t1"></td>
                        </tr>
                        <tr>
                            <td>Ugaitz Umazabal</td>
                            <td>Ocupado</td>
                            <td><input type="radio" name="tecnico" id="t1" disabled></td>
                        </tr>
                        <tr>
                            <td>Sergio Medinabeitia</td>
                            <td>Fuera del trabajo</td>
                            <td><input type="radio" name="tecnico" id="t1" disabled></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <input type="submit" value="Registrar" class="btn btn-primary col-lg-6 col-md-9 mx-auto d-block"
                   style="font-size: xx-large;">
        </form>
    </div>
@endsection
