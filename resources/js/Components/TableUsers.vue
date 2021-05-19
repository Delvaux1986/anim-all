<template>
<div class="w-10/12 flex flex-col justify-center items-center">
    <h2 class="text-pink text-3xl my-3 uppercase font-extrabold">Employés :</h2>
    <table class="table-auto w-10/12 bg-white border-collapse border">
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
export default {
    data(){
        return {

            usersList: [],    
        }
    },
    setup() {
        
        },
    mounted() {
        this.getUsers();
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