<template>
    <div class="flex flex-col items-center justify-center">
    <h2 class="text-pink text-3xl my-6 uppercase font-extrabold">Pensionnaires :</h2>
    <table class="table w-10/12 border-separate border p-1">
        <thead class="table-row-group border  border-green-800 ">
            <tr class="table-row">
                <th class="table-cell border">#</th>
                <th class="table-cell border">Nom</th>
                <th class="table-cell border">Mail</th>
                <th class="table-cell border">Travail Auj</th>
                <th class="table-cell border">Début</th>
                <th class="table-cell border">Fin</th>
                <th class="table-cell border">Rôle</th>
                <th :v-if="role === 1 || role ===2" class="table-cell border">Editer</th>
                <th :v-if="role === 1 || role ===2" class="table-cell border">Supprimer</th>
            </tr>
        </thead>
        <tbody class="table-row-group">
            <tr v-for="(user,id) in this.usersList" :key="id">
                <th class="table-cell border">{{user.id ? user.id : 'N/A'}}</th>
                <th class="table-cell border">{{user.name ? user.name : 'N/A'}}</th>
                <th class="table-cell border">{{user.email ? user.email : 'N/A'}}</th>
                <th class="table-cell border">{{user.workToday ? 'Oui' : 'Non'}}</th>
                <th class="table-cell border">{{user.startWork ? user.startWork.substr(0, 5) : 'N/A'}}</th>
                <th class="table-cell border">{{user.endWork ? user.endWork.substr(0, 5) : 'N/A'}}</th>
                <th class="table-cell border">{{user.role ? user.role.name : 'N/A'}}</th>
                <th :v-if="role === 1 || role ===2" class="table-cell border"><i class="fas fa-pen-square"></i></th>
                <th :v-if="role === 1 || role ===2" class="table-cell border" ><i class="fas fa-minus-square"></i></th>
            </tr>
        </tbody>
    </table>
</div>
</template>

<script>
    export default {
        setup() {
            
        },
        data(){
            return {

            }
        },
        props : {
            role : Number
        },
        mounted(){
            console.log(this.role)
        }
    }
</script>

<style>

</style>