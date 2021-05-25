<template>
    <Menu></Menu>
    <button @click="goToRegisterRoute()">ENREGISTER</button>
</template>

<script>
    import Menu from './../../Components/Menu'
    export default {
        components: {
            Menu
        },
        data() {
            return {
                roleList : [],
                file  : null ,
                form: {
                    id : '',
                    name: '',
                    email: '',
                    role_id: '',
                    workToday: '',
                    startWork: '',
                    endWork: '',
                    profile_photo_path: ''
                }
            }
        },
        methods : {
            selectPhoto(e) {
                this.file = e.target.files[0]
            },
            getAllRole() {
                axios.get('/api/getAllRole').then((response) => {
                    response.data.forEach(role => {
                        this.roleList.push(role)
                    })
                })
            },
            goToRegisterRoute(){
                this.$inertia.get('/register');
            }
        },
        mounted(){
            this.getAllRole();
        }
    }
</script>