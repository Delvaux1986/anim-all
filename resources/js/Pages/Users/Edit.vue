<template>
<Menu></Menu>
<div class="flex flex-col justify-center items-center">
    <h2 class="text-pink text-3xl py-12 uppercase font-extrabold text-center">Modifer {{ this.user.name }}</h2>
    <form class="w-3/6" @submit.prevent="submit">
        <div class="absolute -right-0 overflow-hidden mt-5 flex flex-col items-center" style="margin-right:25%;">
            <label for="profile_photo_path" class="block text-gray-700 text-sm font-bold mb-2">Photo :</label>
            <img :src="'../../Images/users/'+form.profile_photo_path" style="width:350px;height:350px;">
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="profile_photo_path" name="profile_photo_path" type="file" accept=".png, .jpg, .jpeg , .png" @change="selectPhoto">
        </div>
        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nom :</label>
            <input class="shadow appearance-none border rounded w-6/12 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" name="name" type="text" v-model="form.name">
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">E-mail :</label>
            <input class="shadow appearance-none border rounded w-6/12 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" type="email" v-model="form.email">
        </div>
        <div class="mb-4">
            <label for="role_id" class="block text-gray-700 text-sm font-bold mb-2">Famille :</label>
            <select class="shadow appearance-none border rounded w-6/12 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="role_id" name="role_id" v-model="form.role_id">
                <option v-for="role in this.roleList" :key="role.id" :value="role.id">{{ role.name }}</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="workToday" class="block text-gray-700 text-sm font-bold mb-2">Travail Aujourd'hui :</label>
            <select class="shadow appearance-none border rounded w-6/12 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="workToday" name="workToday" v-model="form.workToday">
                <option value="0">Non</option>
                <option value="1">Oui</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="startWork" class="block text-gray-700 text-sm font-bold mb-2">Début du travail :</label>
            <input class="shadow appearance-none border rounded w-6/12 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="startWork" name="startWork" type="time" v-model="form.startWork">
        </div>
        <div class="mb-4">
            <label for="endWork" class="block text-gray-700 text-sm font-bold mb-2">Fin du travail :</label>
            <input class="shadow appearance-none border rounded w-6/12 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="endWork" name="endWork" type="time" v-model="form.endWork">
        </div>
        <input type="submit" value="Modifier" class="focus:outline-none btn-base">
    </form>
</div>
</template>

<script>
import Menu from './../../Components/Menu'
import axios from 'axios'

export default {
    name: 'userEdit',
    components: {
        Menu
    },
    props: ['user'],
    data() {
        return {
            file: null,
            roleList: [],
            form: {
                id : this.user.id,
                name: this.user.name,
                email: this.user.email,
                role_id: this.user.role.id,
                workToday: this.user.workToday,
                startWork: this.user.startWork,
                endWork: this.user.endWork,
                profile_photo_path: this.user.profile_photo_path
            }
        }
    },
    methods: {
        submit() {
            if(this.file){
                let data = new FormData();
                data.append("file", this.file);
                const config = {
                    headers: {
                        'content-type': 'multipart/form-data'
                    }
                }
                axios.post('/uploadUserPhoto', data, config).then((response) => {
                        this.form.profile_photo_path = response.data;
                        this.$inertia.post('/users/update', this.form)
                    })
                    .catch((error) => {
                        console.log(error.response.data.errors);
                    })
            }else{
                this.form.profile_photo_path = 'no-image.gif'
                this.$inertia.post('/users/update', this.form)
            }
        },
        getAllRole() {
            axios.get('/api/getAllRole').then((response) => {
                response.data.forEach(role => {
                    this.roleList.push(role)
                })
            })
        },
        selectPhoto(e) {
            this.file = e.target.files[0]
        },
    },
    mounted(){
        this.getAllRole();
        console.log(this.roleList)
    }
}
</script>

<style>

</style>
