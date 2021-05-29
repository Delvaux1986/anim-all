<template>
    <div v-if="$page.props.flash.success" class="flashSucces">
        {{ $page.props.flash.success }}
    </div>
    <div class="w-screen min-h-screen bg-white flex flex-col justify-center items-center">
    <Menu></Menu>
       <div class="taskCard h-72 w-28 md:w-96 md:rounded-3xl rounded-full shadow-md relative flex flex-col items-center justify-between md:items-start py-5 md:p-5 transition-all duration-150">
        <!-- TEXTS -->
        <div class="transform -rotate-90 md:rotate-0 align-middle text-3xl font-semibold text-gray-200 text-center m-auto md:m-0 md:mt-8">{{ this.task.title }}</div>
        <ul class="text-lg text-gray-300 font-light hidden md:block">
            <li>Titre : {{ this.task.title }}</li>
            <li>Contenu : {{ this.task.content ? this.task.content : 'N/A' }}</li>
            <li>Contenu Complet : {{ this.task.contentFull ? this.task.contentFull : 'N/A'}}</li>
            <li>Debut : {{ formatDate(this.task.start) }}</li>
            <li>Fin : {{ formatDate(this.task.end) }}</li>
            <li>Type : {{ this.task.class }}</li>

        </ul>
    </div>
    </div>
</template>
<script>
import Menu from './../../Components/Menu'
import moment from 'moment'

export default {
    name: 'ShowAnimal',
    components: {
        Menu
    },
    props : ['task'],
    methods : {
        formatDate(value) {
            if (value) {
                return moment(String(value)).format('DD/MM/YYYY  HH:mm')
            }
        },
    }
}
</script>

<style>
    
</style>