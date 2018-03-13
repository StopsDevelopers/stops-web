<template>
    <view-content sectionIcon="fa-building" sectionName="Mis negocios">
        <router-view></router-view>
    </view-content>
</template>

<script>
    import ViewContent from './../components/view-content';

    export default {
        name: "business",
        components: {
            ViewContent
        },
    }
</script>

<style scoped>

</style>