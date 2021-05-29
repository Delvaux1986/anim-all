<template>
    <div class="w-screen min-h-screen bg-white">
        <Menu></Menu>
        <div v-if="$page.props.flash.success" class="flashSucces">
            {{ $page.props.flash.success }}
        </div>
        <h2 class="text-pink text-3xl py-12 uppercase font-extrabold text-center">Personnel</h2>
        <Table-users :role="role"></Table-users>
    </div>
</template>

<script>
import Menu from './../../Components/Menu'
import TableUsers from './../../Components/TableUsers'

export default {
    name: 'IndexUsers',
    components :{
        Menu,
        TableUsers
    },
    mounted() {
        console.log(this.role)
    },
    props:{
        role : Number,
    }
}
</script>

<style>
    
</style>