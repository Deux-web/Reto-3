<template>
    <div>
        <div class="row no-gutters">
            <div class="col-md-5 col-12 mb-1 row no-gutters" id="botones">
            </div>
            <div class="col-md-7 col-12 d-flex justify-content-end align-items-center row">
                <div class="col-4 px-1">
                    <select id="opcion" name="opcion" class="custom-select">
                        <option value="id">Cod. Usuario</option>
                        <option value="nombre">nombre</option>
                        <option value="telefono">Telefono</option>
                        <option value="email">email</option>
                        <option value="estado">Estado</option>
                        <option value="centro">Centro</option>
                        <option value="habilitado">Habilitado</option>
                    </select>
                </div>
                <div class="col-4 px-1">
                    <input type="text" id="datosBusqueda" class="form-control d-inline mr-1">
                </div>
                <div class="col-4 pl-1 pr-0 row no-gutters">
                    <button class="btn btn-primary col-6 d-block mx-auto"
                            style="font-size: 125%"
                            v-on:click=getTecnicosBusqueda()>
                        <i class="fas fa-search"></i>
                    </button>
                    <button class="btn btn-primary col-5 d-block mx-auto" style="font-size: 125%"
                            v-on:click=refrescar()>
                        <i class="fas fa-undo-alt"></i>
                    </button>
                </div>
            </div>
        </div>
        <table id="tabla_tecnicos" class="mt-3 table table-striped table-hover pb-5 table-responsive-sm">
            <thead class="bg-dark text-white">
            <tr>
                <th scope="col" id="th_cod_t">Cod. Usuario</th>
                <th scope="col" id="th_nombre_t">Nombre</th>
                <th scope="col" id="th_apellidos_t">Apellidos</th>
                <th scope="col" id="th_email_t">Email</th>
                <th scope="col" id="th_telefono_t">Telefono</th>
                <th scope="col" id="th_estado_t">Estado</th>
                <th scope="col" id="th_centro_t">Centro</th>
                <th scope="col" id="th_habilitado_t">Habilitado</th>
                <th scope="col" id="th_cambiarHablitado_t">Cambiar Habilitado</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="tecnico in tecnicos">
                <td>{{tecnico.id}}</td>
                <td>{{tecnico.nombre}}</td>
                <td>{{tecnico.apellido_p}} {{tecnico.apellido_s}}</td>
                <td>{{tecnico.email}}</td>
                <td>{{tecnico.telefono}}</td>
                <td>{{tecnico.estado}}</td>
                <td>{{tecnico.centro_id.nombre}}</td>
                <td v-if="tecnico.habilitado==1">Si</td>
                <td v-else>No</td>
                <td><input type="checkbox" :id="tecnico.id" v-on:click="cambiarHabilitado(tecnico.id)"></td>
            </tr>
            </tbody>
        </table>
        <br><br>
        <div class="pagination">
            <div class="d-block mx-auto">
                <button class="btn btn-primary" v-on:click="fetchPaginateTecnicos(pagination.prev_page_url)"
                        :disabled="!pagination.prev_page_url">Anterior
                </button>
                <span>Page {{pagination.current_page}} of {{pagination.last_page}}</span>
                <button class="btn btn-primary" v-on:click="fetchPaginateTecnicos(pagination.next_page_url)"
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
                tecnicos: [],
                url: '/api/tecnicos',
                pagination: []
            }
        },
        created() {
            this.getTecnicos()
        },
        methods: {
            getTecnicosBusqueda() {
                let opcion = $('#opcion').val();
                let datosBusqueda = $('#datosBusqueda').val();
                let $this = this;
                axios.get('/api/tecnicos/' + datosBusqueda + '/' + opcion).then(res => {
                    this.tecnicos = res.data.data;
                    $this.makePagination(res.data)
                })
            },
            getTecnicos() {
                let $this = this;
                axios.get(this.url).then(res => {
                    this.tecnicos = res.data.data;
                    $this.makePagination(res.data)
                })
            },
            refrescar() {
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
            fetchPaginateTecnicos(url) {
                this.url = url;
                this.getTecnicos()
            },
            cambiarHabilitado(usuario_id) {
                axios.post('/tecnicos/' + usuario_id, {})
                    .then(function (res) {
                        location.reload();
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        }
    }
</script>
