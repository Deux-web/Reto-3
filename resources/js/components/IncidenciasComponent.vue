<template>
    <div class="pl-2 pr-2 overflow">
        <table class="mt-3 table table-striped table-hover">
            <thead class="bg-dark text-white">
            <tr>
                <th scope="col">Cod. Incidencia</th>
                <th scope="col">Afectado</th>
                <th scope="col">Contacto</th>
                <th scope="col">Tecnico Asignado</th>
                <th scope="col">Tipo</th>
                <th scope="col">Lugar</th>
                <th scope="col">Estado</th>
                <th scope="col">Fecha de creacion</th>

            </tr>
            </thead>
            <tbody>
            <tr v-for="incidencia in incidencias" v-on:click="verIncidencia(incidencia.id)">
                <td>{{incidencia.id}}</td>
                <td>{{incidencia.id_conductor.nombre+' '+incidencia.id_conductor.apellido_p}}</td>
                <td>{{incidencia.id_conductor.telefono+' '+incidencia.id_conductor.email}}</td>
                <td>{{incidencia.id_tecnico.nombre+' '+incidencia.id_tecnico.apellido_p}}</td>
                <td>{{incidencia.tipo}}</td>
                <td>{{incidencia.direccion}}</td>
                <td>{{incidencia.estado}}</td>
                <td>{{incidencia.created_at}}</td>

            </tr>
            </tbody>
        </table>
        <div class="pagination">
            <button class="btn btn-primary" v-on:click="fetchPaginateIncidencias(pagination.prev_page_url)"
                    :disabled="!pagination.prev_page_url">Anterior
            </button>
            <span>Page {{pagination.current_page}} of {{pagination.last_page}}</span>
            <button class="btn btn-primary" v-on:click="fetchPaginateIncidencias(pagination.next_page_url)"
                    :disabled="!pagination.next_page_url">Siguiente
            </button>
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
            getIncidencias() {
                let $this = this;
                axios.get(this.url).then(res => {
                    this.incidencias = res.data.data;
                    $this.makePagination(res.data)

                })
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
            fetchPaginateIncidencias(url){
                this.url=url;
                this.getIncidencias()
            },
            verIncidencia(id){
                location.href='/incidencias/'+id;
            },
        }
    }
</script>
