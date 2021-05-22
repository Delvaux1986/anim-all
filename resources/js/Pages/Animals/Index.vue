<template>
    <div class="w-screen min-h-screen bg-white">
        <Menu></Menu>
        <div v-if="$page.props.flash.success" class="flashSucces">
            {{ $page.props.flash.success }}
        </div>
        <h2 class="text-pink text-3xl py-12 uppercase font-extrabold text-center">Pensionnaires</h2>
        <TableAnimals :role="role"></TableAnimals>
    </div>
</template>

<script>
import Menu from './../../Components/Menu'
import TableAnimals from './../../Components/TableAnimals'
export default {
    components:{
        Menu,
        TableAnimals
    },
    setup() {
        
    },
    props: {
        role : Number
    },
    mounted(){
        
    }
}
</script>

<style>
    
</style>