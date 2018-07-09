ºº<template>
    <view-content sectionIcon="fa-user" sectionName="Perfil">
        <section class="mb-4">
            <p class="text-muted mb-3">Información personal</p>
            <div class="row">
                <div class="col-9">
                    <p>
                        <strong class="mr-2">Nombre:</strong>
                        <span>Gerardo Soriano</span>
                    </p>
                </div>
                <div class="col-3">
                    <button type="button" class="btn btn-link">Cambiar nombre</button>
                </div>
            </div>
            <div class="row">
                <div class="col-9">
                    <p>
                        <strong class="mr-2">Número celular:</strong>
                        <i class="flag-icon flag-icon-mx"></i>
                        <span>(+52) ••-••••-0673</span>
                    </p>
                </div>
                <div class="col-3">
                    <button type="button" class="btn btn-link">Cambiar número celular</button>
                </div>
            </div>
        </section>
        <section class="mb-4">
            <p class="text-muted mb-3">Cuenta de Stops</p>
            <div class="row">
                <div class="col-9">
                    <p>
                        <strong class="mr-2">Correo electrónico:</strong>
                        <span>gerardosoriano97@gmail.com</span>
                    </p>
                </div>
                <div class="col-3">
                    <button type="button" class="btn btn-link">Cambiar correo electrónico</button>
                </div>
            </div>
            <div class="row">
                <div class="col-9">
                    <p>
                        <strong class="mr-2">Contraseña:</strong>
                        <span>••••••</span>
                    </p>
                </div>
                <div class="col-3">
                    <button type="button" class="btn btn-link">Cambiar contraseña</button>
                </div>
            </div>
        </section>
        <section class="mb-4">
            <p class="text-muted mb-3">Información personal</p>
            <div class="row justify-content-end">
                <div class="col-3">
                    <button type="button" class="btn btn-link">Administrar negocios</button>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-5 d-flex align-items-center">
                    <strong>Le Régate Restaurant - Leobes</strong>
                </div>
                <div class="col-7 d-flex align-items-center">
                    <i class="fa fa-check-circle-o fa-2x mr-2" aria-hidden="true"></i>
                    <span class="text-uppercase font-weight-light mr-2">Visa</span>
                    <span>•••• •••• •••• 7941</span>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-5 d-flex align-items-center">
                    <strong>Le Régate Restaurant - Leobes</strong>
                </div>
                <div class="col-7 d-flex align-items-center">
                    <i class="fa fa-check-circle-o fa-2x mr-2" aria-hidden="true"></i>
                    <span class="text-uppercase font-weight-light mr-2">Paypal</span>
                    <span>gerardosoriano97@gmail.com</span>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-5 d-flex align-items-center">
                    <strong>Le Régate Restaurant - Leobes</strong>
                </div>
                <div class="col-7 d-flex align-items-center">
                    <i class="fa fa-times-circle-o fa-2x mr-2" aria-hidden="true"></i>
                    <span class="text-uppercase font-weight-light mr-2">Visa</span>
                    <span>•••• •••• •••• 7941</span>
                </div>
            </div>
        </section>
    </view-content>
</template>

<script>
    import ViewContent from './../components/view-content'

    export default {
        name: "profile",
        components: {
            ViewContent
        }
    }
</script>

<style scoped>

</style>