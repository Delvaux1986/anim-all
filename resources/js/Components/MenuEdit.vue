<template>
<Modal v-show="isModalVisible" @Refuse="closeModalWithoutAccept" @Accept="closeWithAccept">
    <template v-slot:body>
        Voulez vous supprimez {{this.itemToDelete.name ? this.itemToDelete.name : 'WTF ???'}} de la base de donnée
    </template>
</Modal>
<div class="dropdown">
    <button class="dropbtn"><i class="fas fa-ellipsis-v"></i></button>
    <div class="dropdown-content">
        <a v-if="showLink" :href="showLink">Voir</a>
        <a v-if="editLink" :href="editLink">Editer</a>
        <a v-if="deleteLink"  @click="showModal()">Supprimer</a>
    </div>
</div>
</template>

<script>
import Modal from './Modal'

export default {
    components: {
        Modal
    },
    name: 'MenuEdit',
    props: {
        showLink: String,
        editLink: String,
        deleteLink: String,
        itemToDelete: Object,
    },
    data() {
        return {
            isModalVisible: false,
        }
    },
    methods: {
        showModal() {
            this.isModalVisible = true;
        },
        closeModalWithoutAccept() {
            this.isModalVisible = false;
            this.$inertia.get('/animals');
        },
        closeWithAccept() {
            this.isModalVisible = false;

            this.$inertia.delete(this.deleteLink , this.itemToDelete);
            this.$emit('reloadNeeded');
        }
    },
    mounted(){
        
    }
}
</script>

<style>
.dropbtn {
    color: black;
    padding: 16px;
    font-size: 16px;
    width: 30px;
    height: 20px;
    border: none;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 100px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {
    background-color: #ddd;
}

.dropdown:hover .dropdown-content {
    display: block;
}

/* .dropdown:hover .dropbtn {background-color: var(--color-secondary);} */
</style>
