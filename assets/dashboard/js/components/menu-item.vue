<template>
    <button class="list-group-item list-group-item-action" :id="id" v-on:click="redirect(url)">
        <i class="fa" aria-hidden="true" :class="icon"></i>
        {{ text }}
    </button>
</template>

<script>
    export default {
        name: "menu-item",
        props: {
            id: String,
            icon: String,
            url: String,
            text: String
        },
        methods: {
            redirect: function (url) {
                location.href = url;
            }
        }
    }
</script>

<style scoped>

</style>