<template>
    <Menu></Menu>
<div class="calendar bg-white p-5">
    <h1 class="text-pink text-3xl my-3 uppercase font-extrabold">Tâches :</h1>
    <Calendar></Calendar>
    <Table-users></Table-users>
</div>
</template>

<script>
import Menu from './../Components/Menu'
import Calendar from './../Components/Calendar'
import TableUsers from './../Components/TableUsers'
import axios from 'axios'


export default {
    components: {
        Calendar,
        Menu,
        TableUsers
    },
    
    props: {
        users: Array,
    },
    data() {
        return {             
        }
    },
    methods: {
        
    },
    
}
</script>


