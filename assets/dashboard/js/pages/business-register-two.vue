<template>
    <business-register step="2" info="Ingresa la información de facturación de tu negocio">
        <form action="" class="mt-5">
            <div class="form-row mb-3">
                <div class="col-6">
                    <input type="text" name="name" id="txtName" class="form-control" placeholder="Nombre al que se facturará">
                </div>
            </div>
            <div class="form-row mb-3">
                <div class="col-6">
                    <input type="text" name="rfc" id="txtRfc" class="form-control" placeholder="RFC">
                </div>
            </div>
            <div class="form-row mb-3">
                <div class="col-6">
                    <select name="country" id="txtCountry" class="form-control">
                        <option value="" hidden selected>País / Region</option>
                        <option value=""></option>
                        <option value=""></option>
                        <option value=""></option>
                        <option value=""></option>
                        <option value=""></option>
                    </select>
                </div>
            </div>
            <div class="form-row mb-3">
                <div class="col-6">
                    <input type="text" name="address" id="txtAddress" class="form-control" placeholder="Dirección de facturación">
                </div>
            </div>
            <div class="form-row mb-3">
                <div class="col-6">
                    <input type="text" name="zip" id="txtZip" class="form-control" placeholder="Código Postal">
                </div>
            </div>
            <div class="form-row mb-3">
                <div class="col-3">
                    <input type="text" name="city" id="txtCity" class="form-control" placeholder="Ciudad">
                </div>
                <div class="col-3">
                    <input type="text" name="state" id="txtState" class="form-control" placeholder="Estado">
                </div>
            </div>
            <div class="form-row mb-3">
                <div class="col-6">
                    <div class="form-check">
                        <label for="radEmail" class="form-check-label d-flex align-items-center">
                            <input type="checkbox" name="" id="radEmail" class="form-check-input">
                            Enviar facturas a un segundo correo electrónico
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-row justify-content-end">
                <button type="button" class="btn btn-link text-dark">Cancelar</button>
                <router-link to="step-3" tag="button" class="btn btn-danger">Guardar y Continuar</router-link>
                <!--<button type="button" class="btn btn-danger" onclick="location.href = 'business-step-three.html';">Guardar y Continuar</button>-->
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
        }
    }
</script>

<style scoped>

</style>