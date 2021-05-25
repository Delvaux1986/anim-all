<template>
    <div class="w-screen min-h-screen bg-white">
        <Menu></Menu>
        <h2 class="text-pink text-3xl py-12 uppercase font-extrabold text-center">Modifer {{ this.task.title }}</h2>
            <div class="flex flex-col justify-center items-center w-screen">
                <form class="w-3/6" @submit.prevent="submit">
                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Titre :</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="title" name="title" type="text" v-model="form.title">
                    </div>
                    <div class="mb-4">
                        <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Petite déscription :</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="content" name="content" type="text" v-model="form.content">
                    </div>
                    <div class="mb-4">
                        <label for="contentFull" class="block text-gray-700 text-sm font-bold mb-2">Contenu complet :</label>
                        <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="contentFull" name="contentFull"  v-model="form.contentFull"></textarea>
                    </div>
                    <div class="mb-4">
                    <label for="class" class="block text-gray-700 text-sm font-bold mb-2">Type :</label>
                    <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="class" name="class" v-model="form.class">
                        <option value="reunion">Réunion</option>
                        <option value="cleaning">Néttoyage</option>
                        <option value="walking">Promenade</option>
                    </select>
                    </div>
                     <div class="mb-4">
                        <label for="start" class="block text-gray-700 text-sm font-bold mb-2">Début :</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="start" name="start" type="datetime-local" v-model="form.start">
                    </div>
                    <div class="mb-4">
                        <label for="end" class="block text-gray-700 text-sm font-bold mb-2">Fin :</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="end" name="end" type="datetime-local"  v-model="form.end">
                    </div>
                    <input type="submit" value="Modifier" class="focus:outline-none btn-base">
                </form>
            </div>
    </div>
</template>

<script>
import Menu from './../../Components/Menu'
import moment from 'moment'

export default {
    name : 'EditTask',
    components : { Menu },
    props : ['task'],
    data() {
        return {
            form: {
                id : this.task.id,
                title : this.task.title,
                content : this.task.content,
                contentFull : this.task.contentFull,
                start : this.formatDate(this.task.start),
                end : this.formatDate(this.task.end),
                class : this.task.class
            }
        }
    },
    methods : {
        submit(){
            this.$inertia.post('/tasks/update', this.form);
        },
        formatDate(dateString){
            return moment(dateString).format('YYYY-MM-DDThh:mm:ss')
        }
    },
    mounted(){
        console.log(this.task.start)
    }
}
</script>