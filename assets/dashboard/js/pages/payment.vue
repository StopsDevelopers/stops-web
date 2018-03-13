<template>
    <view-content sectionIcon="fa-credit-card-alt" sectionName="Mis pagos y facturación">
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
        <div class="row p-3 d-flex justify-content-between align-items-center">
            <div class="col-3">
                <div class="row">
                    <p class="lead m-0">01/01/2018</p>
                </div>
                <div class="row">
                    <p class="lead m-0"><strong>$2,000.00</strong></p>
                </div>
                <div class="row">
                    <p class="lead m-0 small">VISA •••• •••• •••• 7941</p>
                </div>
            </div>
            <div class="col-5">
                <div class="row">
                    <p class="lead"><strong>La Régate Restaurant - Leones</strong></p>
                </div>
                <div class="row">
                    <p class="small">Registro exitoso del negocio en la plataforma de Stops.</p>
                </div>
            </div>
            <div class="col-3">
                <button class="btn btn-link">Ver Detalles de Facturación</button>
            </div>
        </div>
        <div class="row p-3 d-flex justify-content-between align-items-center">
            <div class="col-3">
                <div class="row">
                    <p class="lead m-0">01/01/2018</p>
                </div>
                <div class="row">
                    <p class="lead m-0"><strong>$2,000.00</strong></p>
                </div>
                <div class="row">
                    <p class="lead m-0 small">MC •••• •••• •••• 4067</p>
                </div>
            </div>
            <div class="col-5">
                <div class="row">
                    <p class="lead"><strong>La Régate Restaurant - Leones</strong></p>
                </div>
                <div class="row">
                    <p class="small">Registro exitoso del negocio en la plataforma de Stops.</p>
                </div>
            </div>
            <div class="col-3">
                <button class="btn btn-link">Ver Detalles de Facturación</button>
            </div>
        </div>
        <div class="row p-3 d-flex justify-content-between align-items-center">
            <div class="col-3">
                <div class="row">
                    <p class="lead m-0">01/01/2018</p>
                </div>
                <div class="row">
                    <p class="lead m-0"><strong>$2,000.00</strong></p>
                </div>
                <div class="row">
                    <p class="lead m-0 small">PAYPAL damian.sepulveda@gmail.com</p>
                </div>
            </div>
            <div class="col-5">
                <div class="row">
                    <p class="lead"><strong>La Régate Restaurant - Leones</strong></p>
                </div>
                <div class="row">
                    <p class="small">Registro exitoso del negocio en la plataforma de Stops.</p>
                </div>
            </div>
            <div class="col-3">
                <button class="btn btn-link">Ver Detalles de Facturación</button>
            </div>
        </div>
        <div class="row p-3 d-flex justify-content-between align-items-center">
            <div class="col-3">
                <div class="row">
                    <p class="lead m-0">01/02/2018</p>
                </div>
                <div class="row">
                    <p class="lead m-0"><strong>$113.99</strong></p>
                </div>
                <div class="row">
                    <p class="lead m-0 small">VISA •••• •••• •••• 7941</p>
                </div>
            </div>
            <div class="col-5">
                <div class="row">
                    <p class="lead"><strong>La Régate Restaurant - Leones</strong></p>
                </div>
                <div class="row">
                    <p class="small">Mensualidad por el servicio de Stops. 57 check-ins realizados por clientes del 01/01/2018 al 31/01/2018.</p>
                </div>
            </div>
            <div class="col-3">
                <button class="btn btn-link">Ver Detalles de Facturación</button>
            </div>
        </div>
    </view-content>
</template>

<script>
    import ViewContent from './../components/view-content';

    export default {
        name: "payment",
        components: {
            ViewContent
        }
    }
</script>

<style scoped>

</style>