<template>
<img :src="logoPath" alt="Logo" srcset="" style="width:200px;height:200px; margin:auto auto;">
</template>

<script>
export default {
    name: 'Logo',
    setup() {

    },
    data() {
        return {
            logoPath: './assets/img/logo/logo.png'
        }
    }
}
</script>
