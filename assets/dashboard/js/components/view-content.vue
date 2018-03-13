<template>
    <div class="col-9">
        <main class="p-3">
            <h3 class="mb-4">
                <i class="fa fa-2x" aria-hidden="true" :class="sectionIcon"></i>
                {{ sectionName }}
            </h3>
            <slot></slot>
        </main>
    </div>
</template>

<script>
    export default {
        name: "view-content",
        props: {
            sectionIcon: String,
            sectionName: String,
        }
    }
</script>

<style scoped>

</style>