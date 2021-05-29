<template>
<div v-if="$page.props.flash.success" class="flashSucces">
    {{ $page.props.flash.success }}
</div>
<div class="w-screen min-h-screen bg-white flex flex-col justify-center items-center">
    <Menu></Menu>
    <!-- CARD -->
    <div class="animalCard h-72 w-28 md:w-96 md:rounded-3xl rounded-full shadow-md relative flex flex-col items-center justify-between md:items-start py-5 md:p-5 transition-all duration-150">
        <!-- IMG PROFILE -->
        <img class="rounded-full w-20 h-20 shadow-sm absolute -top-8 transform md:scale-110 duration-700" :src="'../../Images/animaux/'+this.animal.img_url" :alt="'Photo de l\'animal ' +animal.name" />

        <!-- TEXTS -->
        <div class="transform -rotate-90 md:rotate-0 align-middle text-3xl font-semibold text-gray-200 text-center m-auto md:m-0 md:mt-8">{{ this.animal.name }}</div>
        <ul class="text-lg text-gray-300 font-light hidden md:block">
            <li>Famille : {{ this.animal.family.name }}</li>
            <li>Race : {{ this.animal.race }}</li>
            <li>Age : {{ this.animal.age }} an(s)</li>
            <li>Genre : {{ this.animal.gender }}</li>
            <li>Arrivé le : {{ formatDate(this.animal.created_at) }}</li>
            <li>Status : {{ this.animal.status }}</li>

        </ul>
    </div>
    <!-- RECORDS -->
    <div v-if="this.animal.stories" style="width:50%;" class="animalCard h-72 md:w-96 md:rounded-3xl rounded-full shadow-md relative flex flex-col items-center justify-start md:items-start py-5 md:p-5 transition-all duration-150 mt-5">
        <ul v-for="story in this.animal.stories" :key="story.id">
            <li>- Le {{ formatDate(story.created_at) }} : {{ story.description }}</li>
        </ul>
    </div>
</div>
</template>

<script>
import Menu from './../../Components/Menu'
import moment from 'moment';
export default {
    name: 'ShowAnimal',
    components: {
        Menu
    },
    props: ['animal'],
    setup() {

    },
    mounted() {
        console.log(this.animal)
    },
    methods: {
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
