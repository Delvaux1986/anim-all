<template>
    <div class="w-screen min-h-screen bg-white">
        <Menu></Menu>
        <div v-if="$page.props.flash.success" class="flashSucces">
            {{ $page.props.flash.success }}
        </div>
        <h2 class="text-pink text-3xl py-12 uppercase font-extrabold text-center">Cages</h2>
        <Table-cages :role="role"></Table-cages>
    </div>
</template>

<script>
import Menu from './../../Components/Menu'
import TableCages from './../../Components/TableCages'
    export default {
        name: 'IndexCages',
        components :{
            Menu,
            TableCages
        },
        props : {
            role : Number,
        }
}
</script>