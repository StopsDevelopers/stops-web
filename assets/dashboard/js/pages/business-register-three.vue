<template>
    <business-register step="3" info="Asigna un metodo de pago recurrente para tu negocio">
        <form action="" class="mt-5">
            <div class="form-row mb-3">
                <div class="col-7 border border-dark p-2">
                    <div class="form-check m-0">
                        <label for="radCard" class="form-check-label d-flex align-items-center justify-content-between">
                            <input type="radio" name="method" id="radCard" class="form-check-input my-0" v-model="method" value="PAGO_CON_TARJETA">
                            Tarjeta de crédito / débito / prepagada
                            <div class="images">
                                <a href="http://www.credit-card-logos.com/">
                                    <img alt="Credit Card Logos" title="Credit Card Logos" src="http://www.credit-card-logos.com/images/visa_credit-card-logos/visa_logo_3.gif" width="35" height="22" border="0" />
                                </a>
                                <a href="http://www.credit-card-logos.com/">
                                    <img alt="Credit Card Logos" title="Credit Card Logos" src="http://www.credit-card-logos.com/images/mastercard_credit-card-logos/mastercard_logo_4.gif" width="35" height="22" border="0" />
                                </a>
                                <a href="http://www.credit-card-logos.com/">
                                    <img alt="Credit Card Logos" title="Credit Card Logos" src="http://www.credit-card-logos.com/images/american_express_credit-card-logos/american_express_logo_5.gif" width="35" height="22" border="0" />
                                </a>
                            </div>
                            <!-- <a href='https://payments.intuit.com/payments/landing_pages/LB/default.jsp?c=VMA&l=H&s=1&b=FFFFFF'target='_blank'><img alt='Credit card logos' title='Credit card logos' src='//payments.intuit.com/payments/landing_pages/LB/default.jsp?c=VMA&l=H&s=1&b=FFFFFF'/></a> -->
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-row mb-3">
                <div class="col-7 border border-dark p-2">
                    <div class="form-check m-0">
                        <label for="radAccount" class="form-check-label d-flex align-items-center justify-content-between">
                            <input type="radio" name="method" id="radAccount" class="form-check-input my-0" v-model="method" value="PAGO_CON_PAYPAL">
                            Usar cuenta existente / crear cuenta de
                            <img src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/PP_logo_h_100x26.png" alt="PayPal Logo" height="22" class="mr-4">
                        </label>
                    </div>
                </div>
            </div>
            <div id="card" class="mt-5 mb-3" v-if="method == 'PAGO_CON_TARJETA'">
                <div class="form-row mb-3">
                    <div class="col-4">
                        <input type="text" name="firstName" id="txtFirstName" class="form-control" placeholder="Nombre">
                    </div>
                    <div class="col-4">
                        <input type="text" name="lastName" id="txtLastName" class="form-control" placeholder="Apellido">
                    </div>
                </div>
                <div class="form-row mb-3">
                    <div class="col-8">
                        <input type="number" name="number" id="txtNumber" class="form-control" placeholder="Número de tarjeta">
                    </div>
                </div>
                <div class="form-row mb-3">
                    <div class="col-4">
                        <select name="date" id="ddlDate" class="form-control">
                            <option selected>Fecha de vencimiento (MM/AA)</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <div class="col-4">
                        <input type="number" name="code" id="txtCode" class="form-control" placeholder="Código de seguridad (CVV)">
                    </div>
                </div>
                <div class="form-row mb-3">
                    <div class="col-8 p-4 small">
                        <p>Stops realizará una autorización temporal en la tarjeta para verificar el método de pago. Dicha autorización NO es un cargo y el monto de la autorización será devuelto a la brevedad posible. Su banco podría notificarle sobre la autorización.</p>
                        <div class="form-check">
                            <label for="cbAccept" class="form-check-label form-row d-flex align-items-center">
                                <input type="checkbox" name="accept" id="cbAccept" class="form-control col-1">
                                <p class="col-10 m-0">Acepto los <a href="" class="text-primary">Términos y Condiciones</a> del uso de Stops y del manejo de la información proporcionada según lo establecido en el <a href="" class="text-primary">Aviso de Privacidad.</a></p>
                            </label>
                        </div>
                        <p>Las tarjetas de crédito pueden estar sujetas a cargos adicionales por parte del banco. Consulte con su banco para cualquier aclaración.</p>
                    </div>

                </div>
            </div>
            <div id="account" class="mt-5 mb-3" v-else-if="method == 'PAGO_CON_PAYPAL'">
                <div class="form-row">
                    <div class="col-8 d-flex justify-content-center">
                        <!--button class="btn btn-link btn-lg">
                            Continuar con <img src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/PP_logo_h_150x38.png" alt="PayPal Logo">
                        </button-->
                        <paypal-checkout amount="10.00"
                                         currency="USD"
                                         env="sandbox"
                                         :client="credentials"
                                         :braintree="braintreeSDK"
                                         v-on:payment-authorized="paymentAuthorized"
                                         v-on:payment-completed="paymentCompleted"
                                         v-on:payment-cancelled="paymentCancelled">
                        </paypal-checkout>
                    </div>
                </div>
                <div class="form-row mb-3">
                    <div class="col-8 p-4 small">
                        <p>Stops realizará una autorización temporal en la tarjeta asociada a la cuenta de PayPal para verificar el método de pago. Dicha autorización NO es un cargo y el monto de la autorización será devuelto a la brevedad posible. Su banco podría notificarle sobre la autorización.</p>
                        <div class="form-check">
                            <label for="cbAccept" class="form-check-label form-row d-flex align-items-center">
                                <input type="checkbox" name="accept" id="cbAccept" class="form-control col-1">
                                <p class="col-10 m-0">Acepto los <a href="" class="text-primary">Términos y Condiciones</a> del uso de Stops y del manejo de la información proporcionada según lo establecido en el <a href="" class="text-primary">Aviso de Privacidad.</a></p>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row justify-content-end">
                <button type="button" class="btn btn-link text-dark">Cancelar</button>
                <router-link to="business" tag="button" class="btn btn-danger disabled">Guardar y Continuar</router-link>
            </div>
        </form>
    </business-register>
</template>

<script>
    import PaypalCheckout from 'vue-paypal-checkout';
    import Braintree from 'braintree-web';
    import BusinessRegister from './../components/business-register';

    export default {
        name: "business-register-three",
        components: {
            PaypalCheckout,
            BusinessRegister
        },
        methods: {
            paymentAuthorized: (data) => {
                console.log(data);
            },
            paymentCompleted: (data) => {
                console.log(data);
            },
            paymentCancelled: (data) => {
                console.log(data);
            }
        },
        data(){
            return{
                method: String,
                conditions: Boolean,
                credentials: {
                    sandbox: ''
                },
                braintreeSDK: Braintree
            }
        },
        beforeMount(){
            $.ajax({
                method: 'POST',
                url: '/api/getPaypalAccessToken',
                dataType: 'json'
            }).done((response) => {
                this.credentials.sandbox = response;
            }).fail((response) => {
                console.log(response);
            })
        }
    }
</script>

<style scoped>

</style>