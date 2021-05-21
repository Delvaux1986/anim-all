<template>
<div>
    <table class="table  bg-white p-1">
        <thead class="table-row-group  text-green text-2xl ">
            <tr class="table-row py-2">
                <th class="table-cell text-left">Nom</th>
                <th class="table-cell text-left">Mail</th>
                <th class="table-cell text-left">Rôle</th>
                <th class="table-cell text-left">Présent</th>
                <th class="table-cell text-right">Début</th>
                <th class="table-cell text-right">Fin</th>
                <th :v-if="role === 1 || role ===2" class="table-cell ">Editer</th>
                <th :v-if="role === 1 || role ===2" class="table-cell ">Supprimer</th>
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
                <th :v-if="role === 1 || role ===2" class="table-cell "><i class="fas fa-pen-square"></i></th>
                <th :v-if="role === 1 || role ===2" class="table-cell " ><i class="fas fa-minus-square"></i></th>


            </tr>
        </tbody>
    </table>
    <div class="flex flex-row justify-center">
            <VueTailwindPagination  id="pagination" :current="laravelData.current_page" :total="laravelData.total" :per-page="laravelData.per_page" @page-changed="getResults"/>
        </div>
    <div class="flex justify-center text-4xl my-5 text-green" :v-if="role === 1 || role ===2"> 
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
    }
</script>