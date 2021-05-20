<template>
    <div class="text-center bg-light text-pink my-4">
        <Menu></Menu>
        <h1>A QUE COUCOU</h1>
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
        console.log(this.role)
    }
}
</script>