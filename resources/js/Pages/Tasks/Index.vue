<template>
    <div class="w-screen  h-screen bg-white">
        <Menu></Menu>
        <h2></h2>
        <Table-tasks :role="role"></Table-tasks>
    </div>
</template>

<script>

import Menu from './../../Components/Menu'
import TableTasks from './../../Components/TableTasks'
    export default {
        components:{
            Menu,
            TableTasks
        },
        setup() {
            
        },
    }
</script>