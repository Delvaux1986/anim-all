<template>
    <div class="text-center bg-light text-pink my-4">
        <Menu></Menu>
        <Table-users></Table-users>
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
}
</script>