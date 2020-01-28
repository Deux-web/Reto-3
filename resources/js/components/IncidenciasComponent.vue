<template>

    <div class="pl-2 pr-2 overflow">
        <select id="opcion" name="opcion">
            <option value="id">Cod. Incidencia</option>
            <option value="nombreConductor">Afectado</option>
            <option value="telefono">Telefono</option>
            <option value="nombreTecnico">Tecnico Asignado</option>
            <option value="tipo">Tipo</option>
            <option value="provincia">Provincia</option>
            <option value="estado">Estado</option>
        </select>
        <input type="text" id="datosBusqueda">
        <input type="button" value="Buscar" class="btn btn-primary col-3" style="font-size: 125%" v-on:click=getIncidenciasBusqueda()>
        <input type="button" value="Refrescar" class="btn btn-primary col-3" style="font-size: 125%" v-on:click=refrescar()>
        <table id="tabla_incidencias" class="mt-3 table table-striped table-hover pb-5 table-responsive-sm">
            <thead class="bg-dark text-white">
            <tr>
                <th scope="col" id="th_cod">Cod. Incidencia</th>
                <th scope="col" id="th_afectado">Afectado</th>
                <th scope="col" id="th_contacto">Contacto</th>
                <th scope="col" id="th_tecnicoasignado">Tecnico Asignado</th>
                <th scope="col" id="th_tipo">Tipo</th>
                <th scope="col" id="th_lugar">Lugar</th>
                <th scope="col" id="th_estado">Estado</th>
                <th scope="col" id="th_fechacreacion">Fecha de creacion</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="incidencia in incidencias" v-on:click="verIncidencia(incidencia.id)">
                <td>{{incidencia.id}}</td>
                <td>{{incidencia.conductor_id.nombre+' '+incidencia.conductor_id.apellido_p}}</td>
                <td>{{incidencia.conductor_id.telefono+' '+incidencia.conductor_id.email}}</td>
                <td v-if="incidencia.tecnico_id !== null">{{incidencia.tecnico_id.nombre+' '+incidencia.tecnico_id.apellido_p}}</td>
                <td v-else class="text-danger">Sin técnico asignado</td>
                <td>{{incidencia.tipo}}</td>
                <td>{{dividirDireccion(incidencia.direccion)}}</td>
                <td>{{incidencia.estado}}</td>
                <td>{{incidencia.created_at}}</td>

            </tr>
            </tbody>
        </table>
        <br><br>
        <div class="pagination">
            <div class="d-block mx-auto">
            <button class="btn btn-primary" v-on:click="fetchPaginateIncidencias(pagination.prev_page_url)"
                    :disabled="!pagination.prev_page_url">Anterior
            </button>
            <span>Page {{pagination.current_page}} of {{pagination.last_page}}</span>
            <button class="btn btn-primary" v-on:click="fetchPaginateIncidencias(pagination.next_page_url)"
                    :disabled="!pagination.next_page_url">Siguiente
            </button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                incidencias: [],
                url: '/api/incidencias',
                pagination: []
            }
        },
        created() {
            this.getIncidencias()
        },
        methods: {
            getIncidenciasBusqueda(){
                let opcion=$('#opcion').val();
                let datosBusqueda=$('#datosBusqueda').val();
                let $this = this;
                axios.get('/api/incidencias/'+datosBusqueda+'/'+opcion).then(res => {
                    this.incidencias = res.data.data;
                    $this.makePagination(res.data)
                })
            },
            getIncidencias() {
                let $this = this;
                axios.get(this.url).then(res => {
                    this.incidencias = res.data.data;
                    $this.makePagination(res.data)
                })
            },
            refrescar(){
                location.reload();
            },
            makePagination(data) {
                let pagination = {
                    current_page: data.current_page,
                    last_page: data.last_page,
                    next_page_url: data.next_page_url,
                    prev_page_url: data.prev_page_url,
                }
                this.pagination = pagination;
            },
            fetchPaginateIncidencias(url) {
                this.url = url;
                this.getIncidencias()
            },
            verIncidencia(id) {
                location.href = '/incidencias/' + id;
            },
            dividirDireccion(incidencia) {
                let direccion_array = incidencia.split(',');
                let direccion_string = '';
                if (direccion_array.length > 5) { // interurbano
                    direccion_string += direccion_array[1] + ' ' +direccion_array[3] + ' KM:' +direccion_array[4] + ' ' +direccion_array[5];
                } else { //urbano
                    direccion_string += direccion_array[1] + ' ' +direccion_array[2] + ' ' +direccion_array[3] + ' ' +direccion_array[4];
                }
                return direccion_string;
            }
        }
    }
</script>
