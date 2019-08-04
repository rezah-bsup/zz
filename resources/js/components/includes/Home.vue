<template>
    <div class="row">
        <div class="col-lg-12">
            <h1>این صفحه خانه است</h1>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Home",
        created() {
            this.$snotify.success('reza');
        }
    }
</script>

<style scoped>

</style>