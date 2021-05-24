<template>
<div>
    <table class="table  bg-white p-1 w-4/5">
        <thead class="table-row-group  text-green text-2xl ">
            <tr class="table-row py-2">
                <th class="table-cell text-left">Nom</th>
                <th class="table-cell text-left">Mail</th>
                <th class="table-cell text-left">Rôle</th>
                <th class="table-cell text-left">Présent</th>
                <th class="table-cell text-right">Début</th>
                <th class="table-cell text-right">Fin</th>
                <th class="table-cell" v-if="this.$inertia.page.url == this.editable && role=== 2 || this.$inertia.page.url == this.editable && role === 1 "></th>
            </tr>
        </thead>
        <tbody class="table-row-group">
            <tr v-for="(user,id) in this.laravelData.data" :key="id">
                <th class="table-cell text-left">{{user.name ? user.name : 'N/A'}}</th>
                <th class="table-cell text-left">{{user.email ? user.email : 'N/A'}}</th>
                <th class="table-cell text-left">{{user.role ? user.role.name : 'N/A'}}</th>
                <th class="table-cell text-left">{{user.workToday ? 'Oui' : 'Non'}}</th>
                <th class="table-cell text-right">{{user.startWork ? user.startWork.substr(0, 5) : 'N/A'}}</th>
                <th class="table-cell text-right">{{user.endWork ? user.endWork.substr(0, 5) : 'N/A'}}</th>
                <th class="table-cell" v-if="this.$inertia.page.url == this.editable && role=== 2 || this.$inertia.page.url == this.editable && role === 1 ">
                    <Menu-edit 
                    :showLink="'/users/show/' + user.id"
                    :editLink="'/users/edit/' + user.id"
                    :itemToDelete="user" @reloadNeeded="reloadComponent()"></Menu-edit>
                </th>
            </tr>
        </tbody>
    </table>
    <div class="flex flex-row justify-center">
        <VueTailwindPagination id="pagination" :current="laravelData.current_page" :total="laravelData.total" :per-page="laravelData.per_page" @page-changed="getResults" />
    </div>
    <div class="flex justify-center my-5 " v-if="this.$inertia.page.url == this.editable && role=== 2 || this.$inertia.page.url == this.editable && role === 1 ">
        <div class="btn-send"><i class="fas fa-plus  p-3"></i></div>
    </div>
</div>
</template>

<script>
import axios from 'axios'
import VueTailwindPagination from '@ocrv/vue-tailwind-pagination'
import MenuEdit from './MenuEdit.vue'

export default {
    components: {
        VueTailwindPagination,
        MenuEdit
    },
    data() {
        return {
            laravelData: {},
            editable: '/users',
        }
    },
    setup() {

    },
    mounted() {
        this.getResults();
        console.log(this.$inertia.page.url === this.editable)
        // console.log(this.editable)
    },
    methods: {

        getResults(page = 1) { // PAGINATION
            if (typeof page === 'undefined') {
                page = 1;
            }
            axios.get('/getAllUsers?page=' + page).then(response => {
                this.laravelData = response.data;
            });
        },
        reloadComponent() {
            this.getResults();
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
