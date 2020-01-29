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
                        <option value="email">email</option>
                        <option value="habilitado">Habilitado</option>
                        <option value="rol">Rol</option>
                    </select>
                </div>
                <div class="col-4 px-1">
                    <input type="text" id="datosBusqueda" class="form-control d-inline mr-1">
                </div>
                <div class="col-4 pl-1 pr-0 row no-gutters">
                    <button class="btn btn-primary col-6 d-block mx-auto"
                            style="font-size: 125%"
                            v-on:click=getUsuariosBusqueda()>
                        <i class="fas fa-search"></i>
                    </button>
                    <button class="btn btn-primary col-5 d-block mx-auto" style="font-size: 125%"
                            v-on:click=refrescar()>
                        <i class="fas fa-undo-alt"></i>
                    </button>
                </div>
            </div>
        </div>
        <table id="tabla_usuarios" class="mt-3 table table-striped table-hover pb-5 table-responsive-sm">
            <thead class="bg-dark text-white">
            <tr>
                <th scope="col" id="th_cod">Cod. Usuario</th>
                <th scope="col" id="th_nombre">Nombre</th>
                <th scope="col" id="th_apellidos">Apellidos</th>
                <th scope="col" id="th_email">Email</th>
                <th scope="col" id="th_rol">Rol</th>
                <th scope="col" id="th_habilitado">Habilitado</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="usuario in usuarios" v-on:click="verUsuario(usuario.id)">
                <td>{{usuario.id}}</td>
                <td>{{usuario.nombre}}</td>
                <td>{{usuario.apellido_p}} {{usuario.apellido_s}}</td>
                <td>{{usuario.email}}</td>
                <td>{{usuario.rol}}</td>
                <td v-if="usuario.habilitado==1">Si</td>
                <td v-else>No</td>
            </tr>
            </tbody>
        </table>
        <br><br>
        <div class="pagination">
            <div class="d-block mx-auto">
                <button class="btn btn-primary" v-on:click="fetchPaginateUsuarios(pagination.prev_page_url)"
                        :disabled="!pagination.prev_page_url">Anterior
                </button>
                <span>Page {{pagination.current_page}} of {{pagination.last_page}}</span>
                <button class="btn btn-primary" v-on:click="fetchPaginateUsuarios(pagination.next_page_url)"
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
                usuarios: [],
                url: '/api/usuarios',
                pagination: []
            }
        },
        created() {
            this.getUsuarios()
        },
        methods: {
            getUsuariosBusqueda() {
                let opcion = $('#opcion').val();
                let datosBusqueda = $('#datosBusqueda').val();
                let $this = this;
                axios.get('/api/usuarios/' + datosBusqueda + '/' + opcion).then(res => {
                    this.usuarios = res.data.data;
                    $this.makePagination(res.data)
                })
            },
            getUsuarios() {
                let $this = this;
                axios.get(this.url).then(res => {
                    this.usuarios = res.data.data;
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
            fetchPaginateUsuarios(url) {
                this.url = url;
                this.getUsuarios()
            },
            verUsuario(id) {
                location.href = '/usuarios/' + id;
            },
        }
    }
</script>
