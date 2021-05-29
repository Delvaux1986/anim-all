<template>
    <app-layout>
    <div>
        <a href="/login">Connecter</a>
        <a href="/register">S'enregister</a>
        <a href="/logout">DECO</a>
    </div>

    </app-layout>
</template>

<script>

import AppLayout from '@/Layouts/AppLayout'

export default {
    components: {
        AppLayout,
    },
    setup() {
        
    },
}
</script>