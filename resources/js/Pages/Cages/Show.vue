<template>
    <div v-if="$page.props.flash.success" class="flashSucces">
        {{ $page.props.flash.success }}
    </div>
    <div class="w-screen min-h-screen bg-white flex flex-col justify-center items-center">
        <Menu></Menu>
        <img class="w-100 h-100 shadow-sm absolute top-25 right-36 transform md:scale-110 duration-700" :src="'../../Images/cages/'+this.cage.img_url" :alt="'Photo de la cage ' +cage.name" />
        <div class="cageCard h-100 w-28 md:w-96 md:rounded-3xl rounded-full shadow-md relative flex flex-col items-center justify-between md:items-start py-5 md:p-5 transition-all duration-150">
        <!-- TEXTS -->
        <div class="transform -rotate-90 md:rotate-0 align-middle text-3xl font-semibold text-gray-200 text-center m-auto md:m-0 md:mt-8 ">{{ this.cage.name }}</div>
            <ul class="text-lg text-gray-300 font-light hidden md:block">
                <li>Type : {{ this.cage.type }}</li>
                <li>Occupé  : {{ this.cage.IsOccuped ? 'Oui' : 'Non' }}</li>
                <li>Premier Repas : {{ this.cage.lunchtimeFirst ? this.cage.lunchtimeFirst.substr(0, 5) : 'N/A'}}</li>
                <li>Check : {{ this.cage.checkFirstLunchtime ? 'Oui' : 'Non' }}</li>
                <li>Deuxieme Repas : {{ this.cage.lunchtimeTwo ?  this.cage.lunchtimeTwo.substr(0, 5) : 'N/A'}}</li>
                <li>Check : {{ this.cage.checkSecondLunchtime ?  'Oui' : 'Non' }}</li>
            </ul>
        </div>
        </div>
    
</template>

<script>
import Menu from './../../Components/Menu'

export default {
    name: '',
    components : {
        Menu
    },
    setup() {
        
    },
    props : {
        cage: Object,
    }
}
</script>