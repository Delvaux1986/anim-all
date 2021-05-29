<template>
    <div v-if="$page.props.flash.success" class="flashSucces">
        {{ $page.props.flash.success }}
    </div>
    <div class="w-screen min-h-screen bg-white flex flex-col justify-center items-center">
    <Menu></Menu>
    <div class="userCard h-72 w-28 md:w-96 md:rounded-3xl rounded-full shadow-md relative flex flex-col items-center justify-between md:items-start py-5 md:p-5 transition-all duration-150">
        <!-- IMG PROFILE -->
        <img class="rounded-full w-20 h-20 shadow-sm absolute -top-8 transform md:scale-110 duration-700" :src="'../../Images/users/'+this.user.profile_photo_path" :alt="'Photo de l\'animal ' +user.name" />

        <!-- TEXTS -->
        <div class="transform -rotate-90 md:rotate-0 align-middle text-3xl font-semibold text-gray-200 text-center m-auto md:m-0 md:mt-8">{{ this.user.name }}</div>
        <ul class="text-lg text-gray-300 font-light hidden md:block">
            <li>Nom : {{ this.user.name }}</li>
            <li>E-mail : {{ this.user.email }}</li>
            <li>Present : {{ this.user.workToday ? 'Oui' : 'Non'}} </li>
            <li>Début : {{ this.user.startWork }}</li>
            <li>Fin : {{ this.user.endWork }}</li>
            <li>Role : {{ this.user.role.name }}</li>

        </ul>
    </div>

    </div>
   
</template>

<script>
import Menu from './../../Components/Menu'
import moment from 'moment'

    export default {
        name : 'showUser',
        components : {
            Menu
        },
        mounted() {
            console.log(this.user)
        },
        props: {
            user : Object
        },
        data(){
            return {
                user : this.user
            }
        }
    }
</script>

<style>
    
</style>