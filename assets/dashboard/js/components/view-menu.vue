<template>
    <div class="col-3">
        <div class="list-group">
            <router-link
                    v-for="section in sections"
                    v-bind:key="section.id"
                    v-bind:to="section.url"
                    tag="button"
                    class="list-group-item list-group-item-action">
                <i class="fa" aria-hidden="true" :class="section.icon"></i>
                {{ section.text }}
            </router-link>
        </div>
    </div>
</template>

<script>
    export default {
        name: "view-menu",
        data: function () {
            return{
                sections: [
                    {
                        id: "btnProfile",
                        icon: "fa-user",
                        text: "Mi perfil",
                        url: "/profile"
                    },
                    {
                        id: "btnBusiness",
                        icon: "fa-building",
                        text: "Mis negocios",
                        url: "/business"
                    },
                    {
                        id: "btnStatistics",
                        icon: "fa-bar-chart",
                        text: "Estadisticas y visitas",
                        url: "/statistics"
                    },
                    {
                        id: "btnCodes",
                        icon: "fa-qrcode",
                        text: "Visitantes y Códigos QR",
                        url: "/codes"
                    },
                    {
                        id: "btnPayment",
                        icon: "fa-credit-card-alt",
                        text: 'Mis Pagos y Facturación',
                        url: "/payment"
                    }
                ]
            }
        }
    }
</script>

<style scoped>

</style>