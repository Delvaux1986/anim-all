<template>
    <Menu></Menu>
        <div class="flex flex-col bg-white w-screen">
            <div class="calendar bg-white p-5">
                <h1 class="text-pink text-3xl my-3 uppercase font-extrabold">Tâches :</h1>
                <Calendar></Calendar>
            </div>
            <div class="">
                <h2 class="text-pink text-3xl my-6 uppercase font-extrabold text-center">Personnel</h2>
                <Table-users class="self-center"></Table-users>
            </div>
        </div>
</template>

<script>
import Menu from './../Components/Menu'
import Calendar from './../Components/Calendar'
import TableUsers from './../Components/TableUsers'


export default {
    name : 'Dashboard',
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
    mounted(){
        console.log();
    }
    
}
</script>


<style>
   
</style>