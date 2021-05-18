<template>
<sidebar-menu @toggle-collapse="onToggleCollapse" @item-click="onItemClick" />
    <sidebar-menu :menu="menu" />
</template>

<script>
   import { SidebarMenu } from 'vue-sidebar-menu'
    import 'vue-sidebar-menu/dist/vue-sidebar-menu.css'
   

    export default {
        components: {
            SidebarMenu
        },
        mounted(){
            console.log(this.menu);
        },
        props : {

        },
        data() {
            return {
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
                ]
            }
        },
        methods: {
                onToggleCollapse(collapsed) {},
                onItemClick(event, item, node) {}
            }
        
}
    
</script>
