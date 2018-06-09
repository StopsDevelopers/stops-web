<template>
    <business-register step="2" info="Ingresa la información de facturación de tu negocio">
        <form action="" class="mt-5">
            <div class="form-row mb-3">
                <div class="col-6">
                    <input type="text" name="name" id="txtName" class="form-control" placeholder="Nombre al que se facturará" v-model="$root.$data.business.register.owner">
                </div>
            </div>
            <div class="form-row mb-3">
                <div class="col-6">
                    <input type="text" name="rfc" id="txtRfc" class="form-control" placeholder="RFC" v-model="$root.$data.business.register.rfc">
                </div>
            </div>
            <div class="form-row mb-3">
                <div class="col-6">
                    <select name="country" id="ddlCountry" class="form-control" v-on:change="onCountryChange" v-model="$root.$data.business.register.country">
                        <option value="0" hidden selected>País / Region</option>
                        <option v-for="country in countries" :value="country.id">{{ country.name }}</option>
                    </select>
                </div>
            </div>
            <div class="form-row mb-3">
                <div class="col-6">
                    <select name="state" id="ddlState" class="form-control" v-on:change="onStateChange" v-model="$root.$data.business.register.state">
                        <option value="0" hidden selected>Estado</option>
                        <option v-for="state in states" :value="state.id">{{ state.name }}</option>
                    </select>
                </div>
            </div>
            <div class="form-row mb-3">
                <div class="col-6">
                    <select name="city" id="ddlCity" class="form-control" v-model="$root.$data.business.register.city">
                        <option value="0" hidden selected>Ciudad</option>
                        <option v-for="city in cities" :value="city.id">{{ city.name }}</option>
                    </select>
                </div>
            </div>
            <div class="form-row mb-3">
                <div class="col-6">
                    <input type="text" name="street" id="txtAddress" class="form-control" placeholder="Calle" v-model="$root.$data.business.register.street">
                </div>
            </div>
            <div class="form-row mb-3">
                <div class="col-6">
                    <input type="text" name="neigborhood" id="txtNeighborhood" class="form-control" placeholder="Colonia" v-model="$root.$data.business.register.neighborhood">
                </div>
            </div>
            <div class="form-row mb-3">
                <div class="col-6">
                    <input type="text" name="exteriorNumber" id="txtExteriorNumber" class="form-control" placeholder="Numero exterior" v-model="$root.$data.business.register.exteriorNumber">
                </div>
            </div>
            <div class="form-row mb-3">
                <div class="col-6">
                    <input type="text" name="interiorNumber" id="txtInteriorNumber" class="form-control" placeholder="Numero interior" v-model="$root.$data.business.register.interiorNumber">
                </div>
            </div>
            <div class="form-row mb-3">
                <div class="col-6">
                    <input type="text" name="zip" id="txtZip" class="form-control" placeholder="Código Postal" v-model="$root.$data.business.register.zip">
                </div>
            </div>
            <div class="form-row mb-3">
                <div class="col-6">
                    <div class="form-check">
                        <label for="radEmail" class="form-check-label d-flex align-items-center">
                            <input type="checkbox" name="" id="radEmail" class="form-check-input" v-model="$root.$data.business.register.sendEmail">
                            Enviar facturas a un segundo correo electrónico
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-row justify-content-end">
                <button type="button" class="btn btn-link text-dark">Cancelar</button>
                <router-link to="step-3" tag="button" class="btn btn-danger">Guardar y Continuar</router-link>
            </div>
        </form>
    </business-register>
</template>

<script>
    import BusinessRegister from './../components/business-register';

    export default {
        name: "business-register-two",
        components: {
            BusinessRegister
        },
        data(){
            return {
                countries: Array(),
                states: Array(),
                cities: Array()
            }
        },
        methods: {
            onCountryChange(){
                $.ajax({
                    method: 'post',
                    url: '/api/getStates',
                    data: {
                        country: this.$root.$data.business.register.country
                    }
                }).done((response) => {
                    this.states = [];
                    this.$root.$data.business.register.state = 0;

                    this.cities = [];
                    this.$root.$data.business.register.city = 0;

                    response.forEach((state) => {
                        this.states.push(state);
                    })
                }).fail((response) => {
                    console.log(response);
                });
            },
            onStateChange(){
                /**
                 * Falta llenar bien la base de datos en ciudades.
                 */
                $.ajax({
                    method: 'post',
                    url: '/api/getCities',
                    data: {
                        state: this.$root.$data.business.register.state
                    }
                }).done((response) => {
                    this.cities = [];
                    this.$root.$data.business.register.city = 0;

                    console.log(response);
                    response.forEach((city) => {
                        this.cities.push(city);
                    })
                }).fail((response) => {
                    console.log(response);
                });
            }
        },
        created(){
            $.ajax({
                method: 'post',
                url: '/api/getCountries'
            }).done((response) => {
                this.countries = response;
            }).fail((response) => {
                console.log(response);
            });
        }
    }
</script>

<style scoped>

</style>