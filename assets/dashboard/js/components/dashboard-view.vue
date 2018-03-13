<template>
    <div class="container">
        <div class="row">
            <view-menu></view-menu>
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
    import ViewMenu from './view-menu';

    export default {
        name: "dashboard-view",
        components: {
            ViewMenu
        }
    }
</script>

<style scoped>

</style>