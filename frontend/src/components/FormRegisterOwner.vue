<template>
    <div class="form-owner">
        <h4 class="text-align-center mb-4 border-bottom pb-2">Registrar Propietario</h4>
        <form class="row g-3">
            <div class="form-floating mb-3 col-md-6">
                <input 

                    type="text" 
                    class="form-control" 
                    id="floatingInputName" 
                    placeholder="nombre" 
                    value="test"
                >
                <label for="floatingInputName">Nombre</label>
            </div>
            <div class="form-floating mb-3 col-md-6">
                <input 
                    type="text" 
                    class="form-control" 
                    id="floatingLastName" 
                    placeholder="Apellidos" 
                    value=""
                >
                <label for="floatingLastName">Apellidos</label>
            </div>
            <div class="form-floating mb-3 col-md-6">
                <input 
                    type="text" 
                    class="form-control" 
                    id="floatingInputDni" 
                    placeholder="DNI" 
                    value=""
                >
                <label for="floatingInputDni">DNI</label>
            </div>

            <div class="form-floating mb-3 col-md-6">
                <input 
                    type="text" 
                    class="form-control" 
                    id="floatingInputPhone" 
                    placeholder="teléfono" 
                    value=""
                >
                <label for="floatingInputPhone">teléfono</label>
            </div>
            <div class="form-floating mb-3">
                <input 
                    type="email" 
                    class="form-control" 
                    id="floatingInputValue" 
                    placeholder="name@example.com" 
                    value="test@example.com"
                >
                <label for="floatingInputValue">Correo Electrónico</label>
            </div>
            <div class="form-floating mb-3">
                <select 
                    class="form-select" 
                    id="floatingCommunityId"
                    aria-label="Floating label select example"
                >
                <option ></option>
                <option value="1">Comunidad 1</option>
                </select>
                <label for="floatingCommunityId">Comunidad a la que pertenece</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</template>
<script>
import { defineComponent } from "vue";

export default defineComponent({
    
});
</script>
<style scoped>
.form-owner {
    width: 100%;
    max-width: 660px;
    padding: 15px;
    margin: auto;
}
</style>