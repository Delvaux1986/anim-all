<template>
    <div class="w-screen  h-screen bg-white">
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