<template>
    <div class="col-3">
        <div class="list-group">
            <menu-item
                    v-for="section in sections"
                    v-bind:id="section.id"
                    v-bind:icon="section.icon"
                    v-bind:url="section.url"
                    v-bind:text="section.text"
                    :key="section.id">
            </menu-item>
        </div>
    </div>
</template>

<script>
    import MenuItem from './menu-item';

    export default {
        name: "view-menu",
        components: {
            MenuItem
        },
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