<template>
    <sidebar-menu @toggle-collapse="onToggleCollapse" @item-click="onItemClick" />
    <sidebar-menu :menu="menu" collapsed='true' disableHover="true"/>
</template>

<script>
import 'vue-sidebar-menu/dist/vue-sidebar-menu.css'
import {
    SidebarMenu
} from 'vue-sidebar-menu'
export default {
    components: {
        SidebarMenu,
    },
    data() {
        return {
            // SET DATA
            usersList: [],
            
            // SET MENU
            menu: [{
                    header: 'Anim-All',
                    hiddenOnCollapse: true
                },
                {
                    href: '/dashboard',
                    title: 'Dashboard',
                    icon: 'fas fa-home'
                },
                {
                    href: '/animals',
                    title: 'Pensionnaires',
                    icon: 'fas fa-paw'
                },
                {
                    href: '/tasks',
                    title: 'Tâches',
                    icon: 'fas fa-tasks'
                },
                {
                    href: '/users',
                    title: 'Employés',
                    icon: 'fas fa-user-cog'
                },
                // {
                //     href: '/charts',
                //     title: 'Charts',
                //     icon: 'fa fa-chart-area',
                //     child: [
                //     {
                //         href: '/charts/sublink',
                //         title: 'Sub Link'
                //     }
                //     ]
                // }
            ],
            
            // DATA OF TABLE USERS
            
            
        }
    },
    methods: {
        onToggleCollapse(collapsed) {},
        onItemClick(event, item, node) {},
        
        getUsers() {
            axios.get('/api/getAllUsers').then((response) => {
                response.data.forEach(user => {
                    this.usersList.push(user)
                });
            })
        }
    },
    
}

</script>

<style>
    .v-sidebar-menu , .v-sidebar-menu .vsm--toggle-btn {
        background-color: var(--color-primary);
    }
    .v-sidebar-menu .vsm--arrow {
        background-color: var(--color-primary);
    }
    
</style>