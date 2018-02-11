<template>
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" :href="logoUrl">
            <img width="40" height="40" class="d-inline-block align-top rounded" :src="logoSrc" :alt="logoAlt">
            <h2 class="d-inline-block">Stops</h2>
        </a>
        <ul class="nav justify-content-end">
            <li class="nav-item"><a href="" class="nav-link text-light">Inicia Sesión/Registrase</a></li>
        </ul>
    </nav>
</template>

<script>
    export default {
        name: "dashboard-header",
        props: {
            logoSrc: String,
            logoAlt: String,
            logoUrl: String,
            isSessionStart: Boolean
        }
    }
</script>

<style scoped>

</style>