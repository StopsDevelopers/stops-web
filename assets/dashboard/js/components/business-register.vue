<template>
    <section class="mb-4">
        <h2 class="font-weight-light">Paso {{ step }} de 3</h2>
        <h4 class="font-weight-light text-muted">{{ info }}</h4>
        <slot></slot>
    </section>
</template>

<script>
    export default {
        name: "business-register",
        props: {
            step: String,
            info: String,
        }
    }
</script>

<style scoped>

</style>