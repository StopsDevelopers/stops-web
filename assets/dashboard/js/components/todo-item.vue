<template>
    <li>{{ todo.text }}</li>
</template>

<script>
    module.exports = {
        props: {
            todo: {
                type: Object,
                required: true
            }
        }
    }
</script>

<style scoped>

</style>