<template>
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" v-bind:href="logo.url">
            <img v-bind:src="logo.img" width="40" height="40" class="d-inline-block align-top rounded" alt="">
            <h2 class="d-inline-block">Stops</h2>
        </a>
        <ul class="nav justify-content-end">
            <li class="nav-item"><a href="" class="nav-link text-light">Inicia Sesión/Registrase</a></li>
        </ul>
    </nav>
</template>

<script>
    module.exports = {
        data: function () {
            return {
                logo: {
                    url: '/business',
                    img: 'images/logotipo.jpeg'
                }
            }
        },
        props: {
            isSessionStart: {
                type: Boolean
            }
        }
    }
</script>

<style scoped>

</style>