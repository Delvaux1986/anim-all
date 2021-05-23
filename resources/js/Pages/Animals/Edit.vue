<template>
    <div class="w-screen min-h-screen bg-white">
        <Menu></Menu>
        <div class="flex flex-col justify-center items-center">
            <h2 class="text-pink text-3xl py-12 uppercase font-extrabold text-center">Modifer {{ this.animal.name }}</h2>
            <form class="w-3/6">
                <img class="absolute -right-0" :src="form.img_url">
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nom :</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" name="name" type="text" v-model="form.name">
                </div>
                <div class="mb-4">
                    <label for="family" class="block text-gray-700 text-sm font-bold mb-2">Famille :</label>
                    <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="feed" name="feed"  v-model="form.family_id">
                        <option v-for="family in this.familyList" :key="family.id" :value="family.id">{{ family.name }}</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="race" class="block text-gray-700 text-sm font-bold mb-2">Race :</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="race" name="race" type="text" v-model="form.race">
                </div>
                <div class="mb-4">
                    <label for="age" class="block text-gray-700 text-sm font-bold mb-2">Age :</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="age" name="age" type="number" v-model="form.age">
                </div>
                <div class="mb-4">
                    <label for="gender" class="block text-gray-700 text-sm font-bold mb-2">Genre :</label>
                    <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="gender" name="gender"  v-model="form.gender">
                        <option value="Male">Male</option>
                        <option value="Femelle">Femelle</option>
                    </select>
                </div>
                 <div class="mb-4">
                    <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status :</label>
                    <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="status" name="status"  v-model="form.status">
                        <option value="Adopté">Adopté</option>
                        <option value="Pensionnaire">Pensionnaire</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="feed" class="block text-gray-700 text-sm font-bold mb-2">Nourri :</label>
                    <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="feed" name="feed"  v-model="form.feed">
                        <option value="0">Non</option>
                        <option value="1">Oui</option>
                    </select>
                </div>
                
            </form>
        </div>
    </div>
</template>

<script>
import Menu from './../../Components/Menu'
export default {
    name : 'EditAnimal',
    components : { Menu },
    setup() {
        
    },
    props: {
        animal: Object,
    },
    data(){
        return {
            familyList : [],
            form : {
                name : this.animal.name,
                race : this.animal.race,
                age : this.animal.age,
                gender : this.animal.gender,
                img_url : this.animal.img_url,
                status : this.animal.status,
                feed : this.animal.feed,
                family_id : this.animal.family.id,
            }
        }
    },
    methods : {
        getAllFamily(){
            axios.get('/api/getAllFamily').then((response) => {
                response.data.forEach(family => {
                    this.familyList.push(family)
                });
            })
        },
    },
    mounted(){
        this.getAllFamily();
        console.log(this.animal)
    }
}
</script>