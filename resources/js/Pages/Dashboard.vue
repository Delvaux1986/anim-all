<template>
    <Menu></Menu>
        <div class="flex flex-col justify-center items-center bg-white w-screen">
            <h1 class="text-pink text-3xl my-3 uppercase font-extrabold">Tâches :</h1>
            <Calendar></Calendar>
            <div class="flex flex-col justify-center items-center w-4/5">
                <h2 class="text-pink text-3xl my-6 uppercase font-extrabold text-center">Personnel</h2>
                <Table-users class="self-center" style="width:100%;"></Table-users>
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
    }
    
}
</script>


<style>
   
</style>