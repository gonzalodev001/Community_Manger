<template>
  <q-page class="q-pa-sm bg-white">
    <div class="row q-col-gutter-sm flex flex-center">
      <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 ">
        <q-stepper
          v-model="step"
          header-nav
          ref="stepper"
          color="primary"
          animated
        >
          <q-step
            :name="1"
            title="Registrar Comunidad"
            icon="shopping_cart"
            :done="step > 1"
            :header-nav="step > 1"
          >
            <div class="row">
              <div class="col-12">
                <q-item>
                  <q-input dense autogrow outlined v-model="community.address" class="full-width"
                           label="Dirección *"/>
                </q-item>
              </div>

            </div>

            <div class="row">
              <div class="col-12">
                <q-item>
                  <q-input dense autogrow outlined v-model="community.municipality" class="full-width"
                           label="Municipalidad 1 *"/>
                </q-item>
              </div>

            </div>

            <div class="row">

              <q-badge color="secondary" multi-line>
                Model: {{ model }}
              </q-badge>
              <div class="col-12">
                <q-item>
                  <q-select dense outlined v-model="model" :options="community_types" class="full-width" label="Tipo comunidad*" emit-value/>
                  <!--<q-input dense autogrow outlined v-model="community.community_type_id" class="full-width"
                           label="Municipalidad 1 *"/>-->
                </q-item>
              </div>

            </div>

            <q-stepper-navigation>
              <q-btn rounded @click="registerCommunity" class="float-right q-mr-md q-mb-md" color="blue"
                     label="Registrar"/>
              <q-btn flat @click="cancelarRegister" color="primary" rounded label="Cancelar" class="q-mr-sm float-right"/>
            </q-stepper-navigation>
          </q-step>

        </q-stepper>
      </div>

    </div>

  </q-page>
</template>

<script>
import {defineComponent} from 'vue';
import {ref} from 'vue';
import {api} from 'boot/axios';

const community_types = [
  {
    id: 'e7a2f328-137b-4073-b92e-c4cad8961697',
    label: 'Edificio'
  },
  {
    id: '4c54ef7b-c2da-42cc-b4ba-67a994d8be95',
    label: 'Parking'
  },
  {
    id: '9b951bbd-51d2-4b70-9444-9f192b02e105',
    label: 'Bares'
  },
  {
    id: '8d57444c-3171-4eae-8688-b8bcf5c37989',
    label: 'Viviendas'
  }
];
export default defineComponent({
  name: "Community",
  setup() {
    const associationId = ref('f33cd8a1-aff0-49f0-8db9-b992e33b6b73')
    const model = ref('')
    const community = ref({
        address: '',
        municipality: '',
        community_type_id: '',
        association_id: ''
    })

    const registerCommunity = () => {
      community.value.community_type_id = model.value
      console.log(community.value)
      api.post('api/communities', community.value).then(response => {
      })
    }
    return {
      step: ref(1),
      model,
      community_types,
      associationId,
      community,
      registerCommunity
    }
  }
})

</script>
