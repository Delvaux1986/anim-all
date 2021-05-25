<template>
    <div class="w-screen min-h-screen bg-white">
        <Menu></Menu>
    </div>
</template>

<script>
import Menu from './../../Components/Menu'
export default {
    name : 'EditTask',
    components : { Menu },
    props : ['task'],
    setup() {
        
    },
}
</script>