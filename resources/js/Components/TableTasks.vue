<template>
<div class="flex flex-col justify-center items-center">
    <table class="table  bg-white p-1">
        <thead class="table-row-group  text-green text-2xl ">
            <tr class="table-row py-2">
                <th class="table-cell text-left">Titre</th>
                <th class="table-cell text-left">Contenu</th>
                <th class="table-cell text-left">Full contenu</th>
                <th class="table-cell text-right">Début</th>
                <th class="table-cell text-right">Fin</th>
                <th class="table-cell text-right">Type</th>
                <th :v-if="role === 1 || role ===2" class="table-cell ">Editer</th>
                <th :v-if="role === 1 || role ===2" class="table-cell ">Supprimer</th>
            </tr>
        </thead>
        <tbody class="table-row-group">
            <tr v-for="(task,id) in this.laravelData.data" :key="id">
                <th class="table-cell text-left">{{task.title ? task.title : 'N/A'}}</th>
                <th class="table-cell text-left">{{task.content ? task.content : 'N/A'}}</th>
                <th class="table-cell text-left">{{task.contentFull ? task.contentFull : 'N/A'}}</th>
                <th class="table-cell text-right">{{task.start ? task.start : 'N/A'}}</th>
                <th class="table-cell text-right">{{task.end ? task.end : 'N/A'}}</th>
                <th class="table-cell text-right">{{task.class ? task.class : 'N/A'}}</th>
                <th :v-if="role === 1 || role ===2" class="table-cell "><i class="fas fa-pen-square"></i></th>
                <th :v-if="role === 1 || role ===2" class="table-cell " ><i class="fas fa-minus-square"></i></th>


            </tr>
        </tbody>
    </table>
    <div class="flex flex-row justify-center">
            <VueTailwindPagination  id="pagination" :current="laravelData.current_page" :total="laravelData.total" :per-page="laravelData.per_page" @page-changed="getResults"/>
        </div>
    <div class="flex justify-center text-4xl my-5 text-green" @click="createTask()" :v-if="role === 1 || role ===2"> 
        <i class="fas fa-plus  p-3"></i>
    </div>
</div>
</template>

<script>
import axios from 'axios'
import VueTailwindPagination from '@ocrv/vue-tailwind-pagination'

    export default {
        name :'tableTasks',
        components : {
            VueTailwindPagination
        },
        setup() {
            
        },
        mounted(){
            
            this.getResults();
        },
        data(){
            return {
                laravelData: {},    
                }
        },
        methods: {
            getResults(page = 1) { // PAGINATION
                    if (typeof page === 'undefined') {
                        page = 1;
                    }
                    axios.get('/getAllTasksforTable?page='+page).then(response => {
                        this.laravelData = response.data;
                        console.log(this.laravelData)
                    });   
            },
            createTask(){
                this.$inertia.get('/tasks/create');
            }
        },
        props : {
            role : Number,
        }
        }
</script>

<style>
    table{
        font-family: 'Roboto Mono', monospace;
        width:80%;
        margin:auto auto;
        
    }
    thead{
        border-bottom: var(--color-primary) 1px solid;
        padding-bottom:10px;
        
    }
    #pagination section {
        border:none;
        
    }
     #pagination section div div{
        /* display:none; */
        
        margin:auto auto;
        border:none;
        outline: none;
        
    }
    #pagination section ul li a div:hover{
        background-color : var(--color-primary) !important;
    }
</style>