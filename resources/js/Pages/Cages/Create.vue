<template>
    <div class="w-screen h-screen bg-white">
        <Menu></Menu>
        <h2 class="text-pink text-3xl py-12 uppercase font-extrabold text-center">Créer une nouvelle cage</h2>
        <form class="flex flex-col justify-center items-center" @submit.prevent="submit">
            <div class="mb-4 w-2/4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nom :</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" name="name" type="text" v-model="form.name">
            </div>
             <div class="mb-4 w-2/4">
                <label for="type" class="block text-gray-700 text-sm font-bold mb-2">Type :</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="type" name="type" type="text" v-model="form.type">
            </div>
            <div class="mb-4 w-2/4">
                <label for="lunchtimeFirst" class="block text-gray-700 text-sm font-bold mb-2">Premier repas :</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="lunchtimeFirst" name="lunchtimeFirst" type="time" v-model="form.lunchtimeFirst">
            </div>
            <div class="mb-4 w-2/4">
                <label for="lunchtimeTwo" class="block text-gray-700 text-sm font-bold mb-2">Deuxieme repas :</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="lunchtimeTwo" name="lunchtimeTwo" type="time" v-model="form.lunchtimeTwo">
            </div>
            <div class="mb-4 w-2/4">
                <label for="img_url" class="block text-gray-700 text-sm font-bold mb-2">Photo :</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="img_url" name="img_url" type="file" accept=".png, .jpg, .jpeg , .png" @change="selectPhoto">
            </div>
            <input type="submit" value="créer" class="focus:outline-none btn-base">
        </form>
    </div>
</template>

<script>
import Menu from './../../Components/Menu'

export default {
    name: '',
    components : {
        Menu
    },
    data() {
        return  {
            file  : null ,
            form : {
                id : '',
                name : '',
                type : '',
                IsOccuped : 0,
                img_url : '',
                lunchtimeFirst : '',
                checkFirstLunchtime : 0,
                lunchtimeTwo : '',
                checkSecondLunchtime : 0
            }
        }
    },
    methods : {
        selectPhoto(e) {
            this.file = e.target.files[0]
        },
         submit() {
            if(this.file){
                let data = new FormData();
                data.append("file", this.file);
                const config = {
                    headers: {
                        'content-type': 'multipart/form-data'
                    }
                }
                axios.post('/uploadCagePhoto', data, config).then((response) => {
                        this.form.img_url = response.data;
                        this.$inertia.post('/cages/store', this.form)
                    })
                    .catch((error) => {
                        console.log(error.response.data.errors);
                    })
            }else{
                this.form.img_url = 'no-image-icon.png'
                this.$inertia.post('/cages/store', this.form)
            }

        }
    }
}
</script>