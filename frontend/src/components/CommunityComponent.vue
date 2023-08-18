<template>
    <!-- Start Table List -->
    <div class="card shadow-none mt-4">
      <div class="card-body p-0 pb-3">
        <div class="d-flex align-items-center justify-content-end my-3">
          <div id="bulk-select-replace-element">
            <button 
                class="btn btn-outline-success btn-sm me-2 shadow rounded" 
                type="button"
                data-bs-toggle="modal"
                data-bs-target="#exampleModal"
            >
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
                Nuevo
            </button>
        </div>
          <div class="d-none ms-3" id="bulk-select-actions">
            <div class="d-flex"><select class="form-select form-select-sm" aria-label="Bulk actions">
                <option selected="selected">Bulk actions</option>
                <option value="Delete">Delete</option>
                <option value="Archive">Archive</option>
              </select><button class="btn btn-falcon-danger btn-sm ms-2" type="button">Apply</button></div>
          </div>
        </div>
        <div class="table-responsive scrollbar">
          <table class="table mb-0">
            <thead class="text-black bg-200">
              <tr>
                <th class="align-middle">CIF</th>
                <th class="align-middle">Dirección </th>
                <th class="align-middle">Municipalidad </th>
                <th class="align-middle">Acciones</th>
              </tr>
            </thead>
            <tbody id="bulk-select-body">
              <tr >
                <th class="align-middle">{{ }}</th>
                <td class="align-middle">{{  }}</td>
                <td class="align-middle">{{  }}</td>
                <td class="align-middle">modificar - eliminar </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!--   End Table List    -->

    <!--    Start Modal Form Register   -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Registrar Tipo de Comunidad</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form class="row g-3">
              <div class="form-floating mb-3">
                  <input 
                      type="text" 
                      class="form-control" 
                      id="floatingInputCIF" 
                      placeholder="CIF" 
                      v-model="cif"
                  >
                  <label for="floatingInputCIF">CIF</label>
              </div>
                <div class="form-floating mb-3">
                    <input 
                        type="text" 
                        class="form-control" 
                        id="floatingInputAddress" 
                        placeholder="Dirección" 
                        v-model="address"
                    >
                    <label for="floatingInputAddress">Dirección</label>
                </div>
                <div class="form-floating mb-3">
                    <input 
                        type="text" 
                        class="form-control" 
                        id="floatingInputMunicipality" 
                        placeholder="Municipalidad" 
                        v-model="municipality"
                    >
                    <label for="floatingInputMunicipality">Municipalidad</label>
                </div>
                <div class="form-floating mb-3">
                    <select 
                        class="form-select" 
                        id="floatingSelectCommunityType" 
                        aria-label="Flotating label select example" 
                        v-model="selected"
                    >
                      <option disabled value="">Seleccione uno...</option>
                      <option v-for="option in options" :key="option.id" :value="option.id">
                        {{ option.name }}
                      </option>
                    </select>
                    <label for="floatingSelectCommunityType">Tipo de Comunidad</label>
                </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" @click="registerCommunity">Registrar</button>
          </div>
        </div>
      </div>
    </div>   

    <!--    End Modal Form Register   -->
</template>
<script setup>

import { onMounted, ref } from "vue";
import { v4 as uuidv4 } from "uuid";
import { useCommunityStore } from "../stores/community";

const community = useCommunityStore();
const address = ref("");
const municipality = ref("");
const selected  = ref("");
const options = ref([]);
const cif = ref("");

onMounted(() => {
    //options.value = await community.searchAllItems();
    community.searchAllItems();
    options.value = community.items;
    //updateListItems();
 });

function registerCommunity() {
    let id = uuidv4();
    console.log(selected.value);
    community.registerCommunity(id, address.value, municipality.value, selected.value, id, cif.value);
}
</script>