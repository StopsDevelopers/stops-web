<template>
    <div class="container">
        <div class="row">
            {# MENU #}
            <div class="col-3">
                <div class="list-group">
                    <button id="btnProfile" class="list-group-item list-group-item-action">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        Mi Perfil
                    </button>
                    <button id="btnBusiness" class="list-group-item list-group-item-action">
                        <i class="fa fa-building" aria-hidden="true"></i>
                        Mis negocios
                    </button>
                    <button id="btnStatistics" class="list-group-item list-group-item-action">
                        <i class="fa fa-bar-chart" aria-hidden="true"></i>
                        Estadisticas de Visitas
                    </button>
                    <button id="btnCodes" class="list-group-item list-group-item-action">
                        <i class="fa fa-qrcode" aria-hidden="true"></i>
                        Volantes y Códigos QR
                    </button>
                    <button id="btnPayment" class="list-group-item list-group-item-action">
                        <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
                        Mis Pagos y Facturación
                    </button>
                </div>
            </div>
            {# INFORMACIÓN #}
            <div class="col-9">
                <main class="p-3">
                    <h3 class="mb-4">
                        <i class="fa {{ section_icon }} fa-2x" aria-hidden="true"></i>
                        {{ section_name }}
                    </h3>
                    {% block section_body %}{% endblock %}
                </main>
            </div>
        </div>
    </div>
</template>

<script>
    module.exports = {

    }
</script>

<style scoped>

</style>