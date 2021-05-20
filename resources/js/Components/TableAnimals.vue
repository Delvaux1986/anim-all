<template>
    <table class="table bg-white p-1">
        <thead class="table-row-group                                                                  ">
            <tr class="table-row">
                <th class="table-cell text-left">Photo</th>
                <th class="table-cell text-left">Nom</th>
                <th class="table-cell text-left">Race</th>
                <th class="table-cell text-left">Genre</th>
                <th class="table-cell text-center">Age</th>
                <th class="table-cell text-left">Status</th>
                <th :v-if="role === 1 || role ===2" class="table-cell ">Editer</th>
                <th :v-if="role === 1 || role ===2" class="table-cell ">Supprimer</th>
            </tr>
        </thead>
        <tbody class="table-row-group">
            <tr v-for="(animal,id) in this.animalList" :key="id">
                <th class="table-cell  text-left" :v-if="animal.img_url"><img :src="animal.img_url" style="width:70px;height:75px;"></th>
                <th class="table-cell text-left">{{animal.name ? animal.name : 'N/A'}}</th>
                <th class="table-cell text-left">{{animal.race ? animal.race : 'N/A'}}</th>
                <th class="table-cell text-left">{{animal.gender ? animal.gender : 'N/A'}}</th>
                <th class="table-cell text-center">{{animal.age ? animal.age : 'N/A'}}</th>
                <th class="table-cell text-left">{{animal.status ? animal.status : 'N/A'}}</th>
                <th :v-if="role === 1 || role ===2" class="table-cell "><i class="fas fa-pen-square"></i></th>
                <th :v-if="role === 1 || role ===2" class="table-cell " ><i class="fas fa-minus-square"></i></th>
            </tr>
        </tbody>
    </table>
    <div class="flex justify-center text-4xl my-5 text-green" @click="createAnimal()"> 
        <i class="fas fa-plus  p-3"></i>
</div>
</template>

<script>
import axios from 'axios'
    export default {
        setup() {
            
        },
        data(){
            return {
                animalList : []
            }
        },
        props : {
            role : Number
        },
        methods :{
            getAllAnimals(){
                axios.get('/api/getAllAnimals').then((response) => {
                    response.data.forEach(animal => {
                        this.animalList.push(animal)
                    });
                })
            },
            createAnimal(){
                this.$inertia.get('/animals/create');
            }
        },
        mounted(){
            console.log(this.animalList)
            this.getAllAnimals();
        }
    }
</script>

<style>
    table{
        font-family: 'Roboto Mono', monospace;
        width:80%;
        margin:auto auto;
    }
    thead{
        border-bottom: tomato 1px solid;
    }
</style>