<template>
    <div class="pl-2 pr-2 overflow">
        <table class="mt-3 table table-striped table-hover">
            <thead class="bg-dark text-white">
            <tr>
                <th scope="col">Cod. Incidencia</th>
                <th scope="col">Título</th>
                <th scope="col">Hora apertura</th>
                <th scope="col">Cliente</th>
                <th scope="col">Contacto</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="coche in coches">
                <td>{{coche.id}}</td>
                <td>{{coche.matricula}}</td>
                <td>{{coche.modelo}}</td>
                <td>{{coche.marca}}</td>
                <td>{{coche.id}}</td>
            </tr>
            </tbody>
        </table>
        <div class="pagination">
            <button class="btn btn-primary" v-on:click="fetchPaginateCoches(pagination.prev_page_url)"
                    :disabled="!pagination.prev_page_url">Anterior
            </button>
            <span>Page {{pagination.current_page}} of {{pagination.last_page}}</span>
            <button class="btn btn-primary" v-on:click="fetchPaginateCoches(pagination.next_page_url)"
                    :disabled="!pagination.next_page_url">Siguiente
            </button>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                coches: [],
                url: '/api/incidencias',
                pagination: []
            }
        },
        created() {
            this.getCoches()
        },
        methods: {
            getCoches() {
                let $this = this;
                axios.get(this.url).then(res => {
                    this.coches = res.data.data;
                    console.log(res.data)
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
            fetchPaginateCoches(url){
                this.url=url;
                this.getCoches()
            }
        }
    }
</script>
