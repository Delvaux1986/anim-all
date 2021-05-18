<template>
<sidebar-menu @toggle-collapse="onToggleCollapse" @item-click="onItemClick" />
    <sidebar-menu :menu="menu" collapsed='true' />
    <div class="calendar bg-green p-5" >
        <h1 class="text-pink text-3xl">Evenements :</h1>
            <vue-cal style="height: 70vh; width:80%;" 
                    class="bg-white text-black flex"
                    today-button
                    :time-from="8 * 60"
                    :time-to="19 * 60"
                    :events="this.events"
                    >
                    <template v-slot:today-button></template>
            </vue-cal>
    </div>
</template>

<script>
    import 'vue-sidebar-menu/dist/vue-sidebar-menu.css'
    import { SidebarMenu } from 'vue-sidebar-menu'
    import 'vue-cal/dist/vuecal.css'
    import VueCal from 'vue-cal'
    import axios from 'axios'
   

    export default {
        components: {
            SidebarMenu,
            VueCal 
        },
        mounted(){
            this.getTasks();
        },
        props : {
            events : Array
        },
        data() {
            return {
                events : [],
                menu: [
                {
                    header: 'Anim-All',
                    hiddenOnCollapse: true
                },
                {
                    href: '/animals',
                    title: 'Pensionnaires',
                    icon: 'fa fa-user'
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
                isCollapsed : true,
            }
        },
        methods: {
                onToggleCollapse(collapsed) {},
                onItemClick(event, item, node) {},
                getTasks(){
                    axios.get('/api/getAllTasks').then((response) => {
                        response.data.forEach(event => {
                            this.events.push(event);
                        });
                         response.data;
                        })
                }
            }
        
}
    
</script>
<style>
    .calendar{
        display:flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width:100%;
    }
    .reunion{
        background-color: yellow;
        color:black;
        border-radius: 10%;
    }
    .cleaning{
        background-color: rgb(57, 145, 228);
        border-radius: 10%;
        color:black;
    }
    .walking{
        background-color: rgb(235, 90, 240);
        border-radius: 10%;
        color:black;
    }
</style>

