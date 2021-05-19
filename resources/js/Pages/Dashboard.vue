<template>
    <Menu></Menu>
<div class="calendar bg-white p-5 shadow-2xl ">
    <h1 class="text-pink text-3xl my-3 uppercase font-extrabold">Tâches :</h1>
    <Calendar></Calendar>
    <h2 class="text-pink text-3xl my-3 uppercase font-extrabold">Employés :</h2>
    <table class="table-auto w-10/12 bg-white shadow-2xl border-collapse border">
        <thead class="table-row-group border  border-green-800 ">
            <tr class="table-row">
                <th class="table-cell">#</th>
                <th class="table-cell">Nom</th>
                <th class="table-cell">Mail</th>
                <th class="table-cell">Travail Auj</th>
                <th class="table-cell">Début</th>
                <th class="table-cell">Fin</th>
                <th class="table-cell">Rôle</th>
            </tr>
        </thead>
        <tbody class="table-row-group">
            <tr v-for="(user,id) in this.usersList" :key="id">
                <th class="table-cell">{{user.id ? user.id : 'N/A'}}</th>
                <th class="table-cell">{{user.name ? user.name : 'N/A'}}</th>
                <th class="table-cell">{{user.email ? user.email : 'N/A'}}</th>
                <th class="table-cell">{{user.workToday ? 'Oui' : 'Non'}}</th>
                <th class="table-cell">{{user.startWork ? user.startWork.substr(0, 5) : 'N/A'}}</th>
                <th class="table-cell">{{user.endWork ? user.endWork.substr(0, 5) : 'N/A'}}</th>
                <th class="table-cell">{{user.role ? user.role.name : 'N/A'}}</th>
            </tr>
        </tbody>
    </table>
</div>
</template>

<script>
import Menu from './../Components/Menu'
import Calendar from './../Components/Calendar'
import axios from 'axios'

export default {
    components: {
        Calendar,
        Menu
    },
    mounted() {
        this.getUsers();
    },
    props: {
        users: Array,
    },
    data() {
        return {
            // SET DATA
            usersList: [],             
        }
    },
    methods: {
        getUsers() {
            axios.get('/api/getAllUsers').then((response) => {
                response.data.forEach(user => {
                    this.usersList.push(user)
                });
            })
        }
    },
    
}
</script>


