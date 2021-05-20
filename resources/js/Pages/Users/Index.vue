<template>
    <div class="w-screen  h-screen bg-white">
        <Menu></Menu>
        <h2 class="text-pink text-3xl py-12 uppercase font-extrabold text-center">Personnel</h2>
        <Table-users :role="role"></Table-users>
    </div>
</template>

<script>
import Menu from './../../Components/Menu'
import TableUsers from './../../Components/TableUsers'

export default {
    components :{
        Menu,
        TableUsers
    },
    setup() {
        
    },
    props:{
        role : Number,
    }
}
</script>