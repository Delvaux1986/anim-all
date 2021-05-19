<template>
    <vue-cal style="height: 70vh; width:80%;" class="bg-white text-black flex" today-button :time-from="8 * 60" :time-to="19 * 60" :events="this.events">
        <template v-slot:today-button></template>
    </vue-cal>
</template>

<script>
import 'vue-cal/dist/vuecal.css'
import axios from 'axios'
import VueCal from 'vue-cal'

export default {
    components:{
        VueCal
    },
    setup() {
        
    },
    mounted() {
        this.getTasks();
    },
    props: {
        events: Array,
    },
    data() {
        return {
            events: [], 
             
        }
    },
    methods: {
        getTasks() {
            axios.get('/api/getAllTasks').then((response) => {
                response.data.forEach(event => {
                    this.events.push(event);
                });
            })
        },
    },
    
}
</script>

<style>
.calendar {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    width: 100%;
}

.reunion {
    background-color: yellow;
    color: black;
    border-radius: 10%;
}

.cleaning {
    background-color: rgb(57, 145, 228);
    border-radius: 10%;
    color: black;
}

.walking {
    background-color: rgb(235, 90, 240);
    border-radius: 10%;
    color: black;
}
</style>