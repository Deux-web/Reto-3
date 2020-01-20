@extends('layout_html')
@section('head')
    <title>Crear incidencia</title>
@endsection
@section('contenido')
    <div>
        <form action="{{route('incidencia.store')}}" method="post" class="m-lg-5">
            <form>
                <div class="form-group">
                    <h3><label for="matricula">Matrícula</label></h3>
                    <div class="row no-gutters">
                        <input type="text" class="form-control col-2 pl-2 pr-2" id="matricula" maxlength="9">
                        <input type="button" class="btn btn-primary col-2 ml-3" value="Comprobar">
                    </div>
                    <small>Formato 0000-NNN ó NN-0000-N</small>
                </div>
                <div class="form-group row no-gutters">
                    <h3 class="mb-0">Titular y conductores habituales</h3>
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
                    <div class="ml-lg-4 col-lg-2">
                        <img class="rounded-lg"
                             src="https://www.actualidadmotor.com/wp-content/uploads/2019/03/fiat-multipla-techo-830x460.jpg"
                             alt="" width="100%">
                    </div>
                </div>
                <div class="form-group">
                    <h4 class="d-inline mr-3"><label for="estado_conductor">Estado del conductor</label></h4>
                    <select name="estado_conductor" id="estado_conductor">
                        <option value="bien">Bien</option>
                        <option value="nervioso">Nervioso</option>
                        <option value="medico">Requiere atención médica</option>
                        <option value="medico_ya">Requiere atención médica URGENTE</option>
                    </select>
                    <label for="urbano" class="ml-5">Urbano</label>
                    <input class="ml-2 mr-2" type="radio" name="zona" id="urbano">
                    /
                    <input class="ml-2 mr-2" type="radio" name="zona" id="interurbano">
                    <label for="interurbano">Interurbano</label>
                </div>
                <div class="form-group row no-gutters p-3" style="border: 1px solid #7e7e7e">
                    <label for="provincia" class="col-3 mr-3 pl-1"><strong>Provincia</strong></label>
                    <label for="tipovia" class="col-3 mr-3 pl-1"><strong>Tipo de vía</strong></label>
                    <label for="carretera" class="col-3 mr-3 pl-1"><strong>Carretera</strong></label>
                    <label for="km" class="col-2 pl-1"><strong>KM</strong></label>
                    <select name="provincia" id="provincia" class="col-3 pr-3 form-control mr-3">
                        <option disabled selected>Seleccione provincia</option>
                        <option value="araba">Araba</option>
                        <option value="bizkaia">Bizkaia</option>
                        <option value="gipuzkoa">Gipuzkoa</option>
                        <option value="nafarroa">Nafarroa</option>
                    </select>
                    <select name="tipovia" id="tipovia" class="pr-3 form-control col-3 mr-3">
                        <option disabled selected>Seleccione tipo de vía</option>
                        <option value="autopista">Autopista</option>
                        <option value="autovia">Autovía</option>
                        <option value="interes_general">Interes general</option>
                        <option value="autonomica">Autonómicas</option>
                        <option value="complementaria">Complementaria</option>
                        <option value="comarcal">Comarcal</option>
                    </select>
                    <input type="text" name="" id="carretera" class="form-control col-3 mr-3 p-1" placeholder="Carretera">
                    <input type="text" name="" id="km" class="form-control col-2 p-1" placeholder="KM">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </form>
    </div>
@endsection
