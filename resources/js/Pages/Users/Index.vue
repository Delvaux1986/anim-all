<template>
    <div class="w-screen  h-screen bg-white">
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
    setup() {
        
    },
    props:{
        role : Number,
    }
}
</script>

<style>
    .flashSucces{
        display:flex;
        width:100%;
        justify-content: center;
        align-items: center;
        text-align: center;
        padding: 5px 15px;
        font-size: 28px;
        color:#BA455A;
        background-color: rgba(64, 224, 208, 0.397);
    }
</style>