<template>
    <table class="table bg-white p-1">
        <thead class="table-row-group                                                                  ">
            <tr class="table-row">
                <th class="table-cell text-left">Photo</th>
                <th class="table-cell text-left">Nom</th>
                <th class="table-cell text-left">Race</th>
                <th class="table-cell text-left">Genre</th>
                <th class="table-cell text-center">Age</th>
                <th class="table-cell text-left">Status</th>
                <th :v-if="role === 1 || role ===2" class="table-cell ">Editer</th>
                <th :v-if="role === 1 || role ===2" class="table-cell ">Supprimer</th>
            </tr>
        </thead>
        <tbody class="table-row-group">
            <tr v-for="(animal,id) in laravelData.data" :key="id">
                <th class="table-cell  text-left" :v-if="animal.img_url"><img :src="animal.img_url" style="width:70px;height:75px;"></th>
                <th class="table-cell text-left">{{animal.name ? animal.name : 'N/A'}}</th>
                <th class="table-cell text-left">{{animal.race ? animal.race : 'N/A'}}</th>
                <th class="table-cell text-left">{{animal.gender ? animal.gender : 'N/A'}}</th>
                <th class="table-cell text-center">{{animal.age ? animal.age : 'N/A'}}</th>
                <th class="table-cell text-left">{{animal.status ? animal.status : 'N/A'}}</th>
                <th :v-if="role === 1 || role ===2" class="table-cell "><i class="fas fa-pen-square"></i></th>
                <th :v-if="role === 1 || role ===2" class="table-cell " ><i class="fas fa-minus-square"></i></th>
            </tr>
        </tbody>
    </table>
    <div class="flex flex-row justify-center ">
        <VueTailwindPagination  id="pagination" :current="laravelData.current_page" :total="laravelData.total" :per-page="laravelData.per_page" @page-changed="getResults"/>
    </div>
    <div class="flex justify-center text-4xl my-5 text-green" @click="createAnimal()"> 
        <i class="fas fa-plus  p-3"></i>
</div>
</template>

<script>
import axios from 'axios'
import VueTailwindPagination from '@ocrv/vue-tailwind-pagination'


    export default {
        components:{
            VueTailwindPagination
        },
        setup() {
            
        },
        data(){
            return {
                animalList : [],
                laravelData: {},
            }
        },
        props : {
            role : Number
        },
        methods :{
            createAnimal(){
                this.$inertia.get('/animals/create');
            },
            getResults(page = 1) { // PAGINATION
                if (typeof page === 'undefined') {
                    page = 1;
                }
                axios.get('/getAllAnimals?page='+page).then(response => {
                    this.laravelData = response.data;
                });
                
                
            }
        },
        mounted(){
            this.getResults();
        }
    }
</script>

<style lang="css">

    table{
        font-family: 'Roboto Mono', monospace;
        width:80%;
        margin:auto auto;
    }
    thead{
        border-bottom: var(--color-pink) 1px solid;
    }
    #pagination section {
        border:none;
        
    }
    
    #pagination section ul li a div::after{
        background-color : var(--color-pink);
    }
</style>