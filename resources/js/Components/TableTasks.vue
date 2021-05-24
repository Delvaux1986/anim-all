<template>
<div class="flex flex-col justify-center items-center">
    <table class="table  bg-white p-1">
        <thead class="table-row-group  text-green text-2xl ">
            <tr class="table-row py-2">
                <th class="table-cell text-left">Titre</th>
                <th class="table-cell text-left">Contenu</th>
                <th class="table-cell text-right">Début</th>
                <th class="table-cell text-right">Fin</th>
                <th class="table-cell text-right">Type</th>
                <th v-if="this.$inertia.page.url == this.editable && role=== 2 || this.$inertia.page.url == this.editable && role === 1 " class="table-cell "></th>
            </tr>
        </thead>
        <tbody class="table-row-group">
            <tr v-for="(task,id) in this.laravelData.data" :key="id">
                <th class="table-cell text-left">{{task.title ? task.title : 'N/A'}}</th>
                <th class="table-cell text-left">{{task.content ? task.content : 'N/A'}}</th>
                <th class="table-cell text-right">{{task.start ? formatDate(task.start) : 'N/A'}}</th>
                <th class="table-cell text-right">{{task.end ? formatDate(task.end) : 'N/A'}}</th>
                <th class="table-cell text-right">{{task.class ? task.class : 'N/A'}}</th>
                <th v-if="this.$inertia.page.url == this.editable && role=== 2 || this.$inertia.page.url == this.editable && role === 1 " class="table-cell ">
                    <Menu-edit></Menu-edit>
                </th>

            </tr>
        </tbody>
    </table>
    <div class="flex flex-row justify-center">
        <VueTailwindPagination id="pagination" :current="laravelData.current_page" :total="laravelData.total" :per-page="laravelData.per_page" @page-changed="getResults" />
    </div>
    <div class="flex justify-center my-5" @click="createTask()" v-if="this.$inertia.page.url == this.editable && role=== 2 || this.$inertia.page.url == this.editable && role === 1 ">
        <div class="btn-send"><i class="fas fa-plus  p-3"></i></div>
    </div>
</div>
</template>

<script>
import axios from 'axios'
import VueTailwindPagination from '@ocrv/vue-tailwind-pagination'
import moment from 'moment';
import MenuEdit from './MenuEdit'

export default {
    name: 'tableTasks',
    components: {
        VueTailwindPagination,
        MenuEdit
    },
    setup() {

    },
    mounted() {
        console.log(this.$inertia.page)
        console.log(this.editable)
        this.getResults();
    },
    data() {
        return {
            laravelData: {},
            editable: '/tasks'
        }
    },
    methods: {
        getResults(page = 1) { // PAGINATION
            if (typeof page === 'undefined') {
                page = 1;
            }
            axios.get('/getAllTasksforTable?page=' + page).then(response => {
                this.laravelData = response.data;
            });
        },
        createTask() {
            this.$inertia.get('/tasks/create');
        },
        formatDate(value) {
            if (value) {
                return moment(String(value)).format('DD/MM/YYYY  hh:mm')
            }
        }
    },
    props: {
        role: Number,
    }
}
</script>

<style>
table {
    font-family: 'Roboto Mono', monospace;
    width: 80%;
    margin: auto auto;

}

thead {
    border-bottom: var(--color-primary) 1px solid;
    padding-bottom: 10px;

}

#pagination section {
    border: none;

}

#pagination section div div {
    /* display:none; */

    margin: auto auto;
    border: none;
    outline: none;

}

#pagination section ul li a div:hover {
    background-color: var(--color-primary) !important;
}
</style>
