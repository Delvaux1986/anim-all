<template>
<Menu></Menu>
<div class="flex flex-col justify-center items-center">
    <h2 class="text-pink text-3xl py-12 uppercase font-extrabold text-center">Modifer {{ this.user.name }}</h2>
    <form class="w-3/6" @submit.prevent="submit">
        
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
            this.$inertia.post('/users/update', this.form)
        },
        getAllRole() {
            axios.get('/api/getAllRole').then((response) => {
                response.data.forEach(role => {
                    this.roleList.push(role)
                })
            })
        }
    },
    mounted(){
        this.getAllRole();
        console.log(this.roleList)
    }
}
</script>

<style>

</style>
