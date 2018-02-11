<template>
    <div class="container">
        <div class="row">
            <view-menu></view-menu>
            <view-content
                    v-bind:sectionIcon="sectionIcon"
                    v-bind:sectionName="sectionName">
                <slot></slot>
            </view-content>
        </div>
    </div>
</template>

<script>
    import ViewMenu from './view-menu';
    import ViewContent from './view-content';

    export default {
        name: "dashboard-view",
        components: {
            ViewMenu,
            ViewContent
        },
        props: {
            sectionIcon: String,
            sectionName: String,
        }
    }
</script>

<style scoped>

</style>