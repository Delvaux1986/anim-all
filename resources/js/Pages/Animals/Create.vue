<template>
    <div class="w-screen h-min-screen bg-white">
        <Menu></Menu>
        <h2 class="text-pink text-3xl py-12 uppercase font-extrabold text-center">Créer un nouvel animal</h2>
        
        <form class="flex flex-col justify-center items-center" @submit.prevent="submit">
            <div class="mb-4 w-2/4">
                <label for="animalName" class="block text-gray-700 text-sm font-bold mb-2">Nom :</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="animalName" name="animalName" type="text" v-model="form.name">
            </div>
            <div class="mb-4 w-2/4">
                <label for="animalFamily" class="block text-gray-700 text-sm font-bold mb-2">Famille :</label>
                <select name="animalFamily" id="" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                     v-model="form.specie_id">
                     <option v-for="family in this.familyList" :key="family.id" :value="family.id">{{ family.name }}</option>

                </select>
            </div>
            <div class="mb-4 w-2/4">
                <label for="animalRace" class="block text-gray-700 text-sm font-bold mb-2">Race :</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="animalRace" name="animalRace" type="text" v-model="form.race">
            </div>
            <div class="mb-4 w-2/4">
                <label for="animalGender" class="block text-gray-700 text-sm font-bold mb-2">Genre :</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="animalGender" name="animalGender" type="text" v-model="form.gender">
            </div>
            <div class="mb-4 w-2/4">
                <label for="animalAge" class="block text-gray-700 text-sm font-bold mb-2">Age :</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="animalAge" name="animalAge" type="number" v-model="form.age">
            </div>
            <div class="mb-4 w-2/4">
                <label for="animalStatus" class="block text-gray-700 text-sm font-bold mb-2">Status :</label>
                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="animalStatus" name="animalStatus" v-model="form.status">
                    <option value="Pensionnaire">Pensionnaire</option>
                    <option value="Adopté">Adopté</option>
                </select>
            </div>
            <div class="mb-4 w-2/4">
                <label for="img_url" class="block text-gray-700 text-sm font-bold mb-2">Photo :</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                id="img_url" name="img_url" type="file" accept=".png, .jpg, .jpeg , .png" @change="selectPhoto" >
            </div>
            <input type="submit" value="créer" class="focus:outline-none">
        </form>
    </div>
</template>

<script>
import Menu from './../../Components/Menu'
export default {
    components:{
        Menu
    },
    setup() {
        
    },
    data(){
        return {
            familyList : [],
            file : null,
            form : {
                name : '',
                specie_id : '',
                race : '',
                gender : '',
                age : '',
                status : '',
                img_url : ''
                
            }
        }
    },
    methods:{
        getAllFamily(){
            axios.get('/api/getAllFamily').then((response) => {
                response.data.forEach(family => {
                    this.familyList.push(family)
                });
            })
        },
        selectPhoto(e){
            this.file = e.target.files[0] 
        },
        submit() {
            let data = new FormData();
            data.append("file", this.file);
            const config = {
                headers: {
                    'content-type': 'multipart/form-data'
                    }
                }
            axios.post('/uploadPhoto' , data , config).then((response) => {
                        this.form.img_url = response.data;
                        this.$inertia.post('/animals/store', this.form)
                    })
                    .catch((error) => {
                        console.log(error.response.data.errors);
                    });
                    console.log(this.form);
        }
    },
    mounted(){
        this.getAllFamily();
    }
}
</script>