<template>
<table class="table bg-white p-1">
    <thead class="table-row-group">
        <tr class="table-row">
            <th class="table-cell text-left">Photo</th>
            <th class="table-cell text-left">Nom</th>
            <th class="table-cell text-left">Race</th>
            <th class="table-cell text-left">Genre</th>
            <th class="table-cell text-center">Age</th>
            <th class="table-cell text-left">Status</th>
            <th v-if="this.$inertia.page.url == this.editable && role=== 2 || this.$inertia.page.url == this.editable && role === 1 " class="table-cell "></th>
        </tr>
    </thead>
    <tbody class="table-row-group">
        <tr v-for="(animal,id) in laravelData.data" :key="id">

            <th class="table-cell  text-left" :v-if="animal.img_url"><img :src="'Images/animaux/'+animal.img_url" style="width:70px;height:75px;" :alt="animal.name"></th>
            <th class="table-cell text-left">{{animal.name ? animal.name : 'N/A'}}</th>
            <th class="table-cell text-left">{{animal.race ? animal.race : 'N/A'}}</th>
            <th class="table-cell text-left">{{animal.gender ? animal.gender : 'N/A'}}</th>
            <th class="table-cell text-center">{{animal.age ? animal.age : 'N/A'}}</th>
            <th class="table-cell text-left">{{animal.status ? animal.status : 'N/A'}}</th>
            <th v-if="this.$inertia.page.url == this.editable && role=== 2 || this.$inertia.page.url == this.editable && role === 1 " class="table-cell ">
                <Menu-edit :showLink="'/animals/show/' + animal.id" :editLink="'/animals/edit/' + animal.id" :deleteLink="'/animals/'+ animal.id" :itemToDelete="animal" @reloadNeeded="reloadComponent()">
                </Menu-edit>
            </th>
        </tr>
    </tbody>
</table>
<div class="flex flex-row justify-center">
    <VueTailwindPagination id="pagination" :current="laravelData.current_page" :total="laravelData.total" :per-page="laravelData.per_page" @page-changed="getResults" />
</div>
<div class="flex justify-center  my-5 " @click="createAnimal()" v-if="this.$inertia.page.url == this.editable && role=== 2 || this.$inertia.page.url == this.editable && role === 1 ">
    <div class="btn-send "><i class="fas fa-plus  p-3"></i></div>
</div>
</template>

<script>
import axios from 'axios'
import VueTailwindPagination from '@ocrv/vue-tailwind-pagination'
import MenuEdit from './MenuEdit'

export default {
    components: {
        VueTailwindPagination,
        MenuEdit,
    },
    setup() {

    },
    data() {
        return {
            animalList: [],
            laravelData: {},
            editable: '/animals'
        }
    },
    props: {
        role: Number
    },
    methods: {
        createAnimal() {
            this.$inertia.get('/animals/create');
        },
        getResults(page = 1) { // PAGINATION
            if (typeof page === 'undefined') {
                page = 1;
            }
            axios.get('/getAllAnimals?page=' + page).then(response => {
                this.laravelData = response.data;
            });
        },
        reloadComponent() {
            this.getResults();
        },
        
    },
    mounted() {
        this.getResults();
    }
}
</script>

<style lang="css">
table {
    font-family: 'Roboto Mono', monospace;
    width: 80%;
    margin: auto auto;
}

thead {
    border-bottom: var(--color-primary) 1px solid;
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
