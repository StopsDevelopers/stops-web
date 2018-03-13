<template>
    <view-content sectionIcon="fa-bar-chart" sectionName="Estadisticas de visitas">
        <form class="form-inline">
            <select name="business" id="ddlBusiness" class="form-control mr-auto">
                <option selected>Todos mis negocios</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
            <label for="ddlFrom" class="text-muted mr-1">Desde</label>
            <input type="date" name="from" id="ddlFrom" class="form-control mr-2">
            <label for="ddlTo" class="text-muted mr-1">Hasta</label>
            <input type="date" name="to" id="ddlTo" class="form-control mr-2">
        </form>
        <hr>
        <div class="row p-3">
            <div class="col-12">
                <div class="position-relative w-100" style="height:20vh">
                    <canvas id="cnvCheckIns"></canvas>
                </div>
            </div>
        </div>
    </view-content>
</template>

<script>
    import ViewContent from './../components/view-content';
    export default {
        name: "statistics",
        components: {
            ViewContent
        }
    }
</script>

<style scoped>

</style>