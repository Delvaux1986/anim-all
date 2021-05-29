<template>
    <table class="table bg-white p-1">
        <thead class="table-row-group">
            <tr class="table-row">
                <th class="table-cell text-left">Photo</th>
                <th class="table-cell text-left">Nom</th>
                <th class="table-cell text-left">Type</th>
                <th class="table-cell text-left">Repas Matin</th>
                <th class="table-cell text-center">Check</th>
                <th class="table-cell text-left">Repas Soir</th>
                <th class="table-cell text-left">Check</th>
                <th class="table-cell text-left">Occupé </th>
                <th v-if="this.$inertia.page.url == this.editable && role=== 2 || this.$inertia.page.url == this.editable && role === 1 " class="table-cell "></th>
            </tr>
        </thead>
    <tbody class="table-row-group">
        <tr v-for="(cage,id) in laravelData.data" :key="id">

            <th class="table-cell  text-left" :v-if="cage.img_url"><img :src="'Images/cages/'+cage.img_url" style="width:70px;height:75px;" :alt="cage.name"></th>
            <th class="table-cell text-left">{{cage.name ? cage.name : 'N/A'}}</th>
            <th class="table-cell text-left">{{cage.type ? cage.type : 'N/A'}}</th>
            <th class="table-cell text-left">{{cage.lunchtimeFirst ? cage.lunchtimeFirst : 'N/A'}}</th>
            <th class="table-cell text-center">{{cage.checkFirstLunchtime ?  'Oui' : 'Non'}}</th>
            <th class="table-cell text-left">{{cage.lunchtimeTwo ? cage.lunchtimeTwo : 'N/A'}}</th>
            <th class="table-cell text-left">{{cage.checkSecondLunchtime ? 'Oui' : 'Non'}}</th>
            <th v-if="this.$inertia.page.url == this.editable && role=== 2 || this.$inertia.page.url == this.editable && role === 1 " class="table-cell ">
                <Menu-edit :showLink="'/cages/show/' + cage.id" :editLink="'/cages/edit/' + cage.id" :deleteLink="'/cages/'+ cage.id" :itemToDelete="cage" @reloadNeeded="reloadComponent()">
                </Menu-edit>
            </th>
        </tr>
    </tbody>
</table>
<div class="flex flex-row justify-center">
    <VueTailwindPagination id="pagination" :current="laravelData.current_page" :total="laravelData.total" :per-page="laravelData.per_page" @page-changed="getResults" />
</div>
<div class="flex justify-center  my-5 " @click="createCage()" v-if="this.$inertia.page.url == this.editable && role=== 2 || this.$inertia.page.url == this.editable && role === 1 ">
    <div class="btn-send "><i class="fas fa-plus  p-3"></i></div>
</div>
</template>

<script>
import axios from 'axios'
import VueTailwindPagination from '@ocrv/vue-tailwind-pagination'
import MenuEdit from './MenuEdit'
export default {
    name: 'TableCages',
    components : {
        VueTailwindPagination,
        MenuEdit
    },
    mounted() {
        this.getResults();
    },
    data() {
        return {
            laravelData: {},
            editable: '/cages',
            
        }
    },
    methods : {
        getResults(page = 1) { // PAGINATION
            if (typeof page === 'undefined') {
                page = 1;
            }
            axios.get('/getAllCages?page=' + page).then(response => {
                this.laravelData = response.data;
            });
        },
    }
}
</script>