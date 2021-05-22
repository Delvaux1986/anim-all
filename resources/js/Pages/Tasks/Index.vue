<template>
    <div class="w-screen  h-screen bg-white">
        <Menu></Menu>
            <h2 class="text-pink text-3xl py-12 uppercase font-extrabold text-center">Tâches</h2>
            
                <Table-tasks :role="role"></Table-tasks>
                <Calendar class="self-center"></Calendar>
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
    }
</script>