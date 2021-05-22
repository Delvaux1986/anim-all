<template>
    <div class="w-screen min-h-screen bg-white">
        <Menu></Menu>
        <div v-if="$page.props.flash.success" class="flashSucces">
            {{ $page.props.flash.success }}
        </div>
        <h2 class="text-pink text-3xl py-12 uppercase font-extrabold text-center">Tâches</h2>
            <Calendar class="self-center"></Calendar>
            <Table-tasks :role="role" class="mt-5"></Table-tasks>
        </div>
    
</template>

<script>

import Menu from './../../Components/Menu'
import TableTasks from './../../Components/TableTasks'
import Calendar from './../../Components/Calendar'

    export default {
        components:{
            Menu,
            TableTasks,
            Calendar
        },
        setup() {
            
        },
        props: {
            role : Number
        },
    }
</script>

<style>
   
</style>