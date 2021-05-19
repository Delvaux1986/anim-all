<template>
<sidebar-menu @toggle-collapse="onToggleCollapse" @item-click="onItemClick" />
<sidebar-menu :menu="menu" collapsed='true' />
<div class="calendar bg-green p-5">
    <h1 class="text-pink text-3xl my-3 uppercase font-extrabold">Tâches :</h1>
    <vue-cal style="height: 70vh; width:80%;" class="bg-white text-black flex" today-button :time-from="8 * 60" :time-to="19 * 60" :events="this.events">
        <template v-slot:today-button></template>
    </vue-cal>
    <h2 class="text-pink text-3xl my-3 uppercase font-extrabold">Employés :</h2>
    <table-lite 
    class="my-5" 
    :has-checkbox="true" 
    :is-loading="table.isLoading" 
    :is-re-search="table.isReSearch" 
    :columns="table.columns" 
    :rows="table.rows" 
    :total="table.totalRecordCount" 
    :sortable="table.sortable" 
    :messages="table.messages" 
    @do-search="doSearch" 
    @is-finished="tableLoadingFinish" 
    @return-checked-rows="updateCheckedRows">
    </table-lite>
</div>
</template>

<script>
import 'vue-sidebar-menu/dist/vue-sidebar-menu.css'
import {
    SidebarMenu
} from 'vue-sidebar-menu'
import TableLite from "vue3-table-lite"
import 'vue-cal/dist/vuecal.css'
import VueCal from 'vue-cal'
import axios from 'axios'

export default {
    components: {
        SidebarMenu,
        VueCal,
        TableLite

    },
    mounted() {
        this.getTasks();
        this.getUsers();
        
        
    },
    props: {
        events: Array,
        users: Array,

    },
    data() {
        return {
            usersList: [],
            events: [],
            menu: [{
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
            isCollapsed: true,
            // DATA OF TABLE USERS
            table: {
                isLoading: false,
                isReSearch: false,
                columns: [{
                        label: "ID",
                        field: "id",
                        width: "3%",
                        sortable: true,
                        isKey: true,
                    },
                    {
                        label: "Name",
                        field: "name",
                        width: "20%",
                        sortable: true,
                        display: function (row) {
                            return (
                                '<a href="#" data-id="' + row.user_id + '" class="name-btn">' + row.name + "</button>"
                            );
                        },
                    },
                    {
                        label: "Email",
                        field: "email",
                        width: "15%",
                        sortable: true,
                    },
                    {
                        label: "Travail",
                        field: "workToday",
                        width: "15%",
                        sortable: true,
                    },
                    {
                        label: "Debut",
                        field: "startWork",
                        width: "15%",
                        sortable: true,
                    },
                    {
                        label: "Fin",
                        field: "endWork",
                        width: "15%",
                        sortable: true,
                    },
                    {
                        label: "Role",
                        field: "role.name",
                        width: "15%",
                        sortable: true,
                    },
                    
                ],
                rows : this.users,
                totalRecordCount: this.usersList,
                sortable: {
                    order: "id",
                    sort: "asc",
                },
                messages: {
                    pagingInfo: "Showing {0}-{1} of {2}",
                    pageSizeChangeLabel: "Row count:",
                    gotoPageLabel: "Go to page:",
                    noDataAvailable: "No data",
                },
            }
        }
    },
    methods: {
        onToggleCollapse(collapsed) {},
        onItemClick(event, item, node) {},
        getTasks() {
            axios.get('/api/getAllTasks').then((response) => {
                response.data.forEach(event => {
                    this.events.push(event);
                });
            })
        },
        getUsers() {
            axios.get('/api/getAllUsers').then((response) => {
                response.data.forEach(user => {
                    this.users.push(user)
                });
            })
        }
    },
    event() {
        doSearch = (offset, limit, order, sort) => {
            table.isLoading = true;
            table.isReSearch = offset == undefined ? true : false;
            // do your search event to get newRows and new Total
            table.rows = newRows;
            table.totalRecordCount = newTotal;
            table.sortable.order = order;
            table.sortable.sort = sort;
            };
        tableLoadingFinish = (elements) => {
            table.isLoading = false;
            Array.prototype.forEach.call(elements, function (element) {
                if (element.classList.contains("name-btn")) {
                element.addEventListener("click", function () {
                    // do your click event
                    console.log(this.dataset.id + " name-btn click!!");
                });
                }
                if (element.classList.contains("quick-btn")) {
                // do your click event
                element.addEventListener("click", function () {
                    console.log(this.dataset.id + " quick-btn click!!");
                });
                }
            });
            };
        updateCheckedRows = (rowsKey) => {
                // do your checkbox click event
                console.log(rowsKey);
            };
    }
}
</script>

<style>
.calendar {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    width: 100%;
}

.reunion {
    background-color: yellow;
    color: black;
    border-radius: 10%;
}

.cleaning {
    background-color: rgb(57, 145, 228);
    border-radius: 10%;
    color: black;
}

.walking {
    background-color: rgb(235, 90, 240);
    border-radius: 10%;
    color: black;
}
</style>
