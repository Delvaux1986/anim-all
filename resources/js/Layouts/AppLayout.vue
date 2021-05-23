<template>
    <header class="bg-green shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <a :href="route('home')">HOME</a>
        </div>
    </header>

    <!-- Page Content -->
    <main>
        <slot></slot>
    </main>
</template>

<script>
export default {
    data(){
           
    },
    setup() {
        
    },
}
</script>