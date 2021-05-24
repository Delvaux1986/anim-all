<template>
<div class="flex flex-row justify-center items-center">
    <button @click="activeView = 'day'" class="p-2 focus:underline">Jour</button>
    <button @click="activeView = 'week'" class="p-2 focus:underline">Semaine</button>
    <button @click="activeView = 'month'" class="p-2 focus:underline">Mois</button>
</div>

<vue-cal style="height: 70vh;width:80%; margin:auto auto;" class="bg-white text-black shadow-2xl" today-button :time-from="8 * 60" :time-to="19 * 60" :events="data" :disable-views="['years','year']" locale="fr" hide-view-selector :active-view="activeView" :overlapsPerTimeStep="true">

    <template v-slot:today-button></template>
</vue-cal>
</template>

<script>
import 'vue-cal/dist/vuecal.css'
import axios from 'axios'
import VueCal from 'vue-cal'
import 'vue-cal/dist/i18n/fr.js'

export default {
    name: "calendar",
    components: {
        VueCal
    },
    setup() {

    },
    mounted() {
        this.getTasks();
        console.log(this.activeView)
    },
    props: {
        data: Array,
    },
    data() {
        return {
            data: [],
            activeView: 'day',

        }
    },
    methods: {
        getTasks() {
            axios.get('/api/getAllTasks').then((response) => {
                response.data.forEach(event => {
                    this.data.push(event);
                });
            })
        },
    },

}
</script>

<style>
.reunion {
    background-color: var(--reunion);
    color: black;

}

.cleaning {
    background-color: var(--cleaning);
    color: black;
}

.walking {
    background-color: var(--walking);
    color: black;
}
</style>
