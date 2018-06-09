<template>
    <business-register step="1" info="Ingresa la información general de tu negocio">
        <form  action="" class="mt-5">
            <div class="form-row mb-3">
                <div class="col-6">
                    <input type="text" name="name" id="txtName" class="form-control" placeholder="Nombre del negocio" v-model="$root.$data.business.register.businessName">
                </div>
            </div>
            <div class="form-row mb-3">
                <div class="col-6">
                    <input type="text" name="branch" id="txtBranch" class="form-control" placeholder="Sucursal (opcional)" v-model="$root.$data.business.register.branch">
                </div>
            </div>
            <div class="form-row mb-3">
                <div class="col-6">
                    <select name="category" id="txtCategory" class="form-control" v-model="$root.$data.business.register.category">
                        <option value="0" hidden selected>Categoria</option>
                        <option v-for="category in categories" :value="category.id">{{ category.name }}</option>
                    </select>
                </div>
            </div>
            <div class="form-row mb-3">
                <div class="col-6">
                    <input type="text" name="subcategory" id="txtSubcategory" class="form-control" placeholder="Subcategoría (e.g. comida italiana, estética, etc)" v-model="$root.$data.business.register.subcategory">
                </div>
            </div>
            <div class="form-row justify-content-end">
                <button type="button" class="btn btn-link text-dark">Cancelar</button>
                <router-link to="step-2" tag="button" class="btn btn-danger" replace>Guardar y Continuar</router-link>
            </div>
        </form>
    </business-register>
</template>

<script>
    import BusinessRegister from './../components/business-register';

    export default {
        name: "business-register-one",
        components: {
            BusinessRegister
        },
        data(){
            return{
                categories: Array(),
            }
        },
        created(){
            $.ajax({
                method: 'post',
                url: '/api/getCategories'
            }).done((response) => {
                this.categories = response;
            }).fail((response) => {
                console.log(response);
            })
        }
    }
</script>

<style scoped>

</style>