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
            title="Registrar Propietario"
            icon="shopping_cart"
            :done="step > 1"
            :header-nav="step > 1"
          >
            <div class="row">
              <div class="col-6">
                <q-item>
                  <q-input dense outlined class="full-width" v-model="personUser.person.firstName" label="First Name *"/>
                </q-item>
              </div>
              <div class="col-6">
                <q-item>
                  <q-input dense outlined class="full-width" v-model="personUser.person.lastName" label="Last Name *"/>
                </q-item>
              </div>
              <div class="col-12">
                <q-item>
                  <q-input dense autogrow outlined v-model="personUser.person.document" class="full-width"
                           label="Address line 1 *"/>
                </q-item>
              </div>
              <div class="col-12">
                <q-item>
                  <q-input dense autogrow outlined v-model="personUser.person.phone" class="full-width"
                           label="Address line 2 *"/>
                </q-item>
              </div>
              <!--<div class="col-12">
                <q-item>
                  <q-select odense autogrow outlined  v-model="personUser.user.communityId" :options="communities" class="full-width" label="Community *" />
                </q-item>
              </div>-->


            </div>

            <q-stepper-navigation>
              <q-btn rounded @click="() => { done1 = true; step = 2 }" class="float-right q-mr-md q-mb-md" color="blue"
                     label="Next"/>
            </q-stepper-navigation>
          </q-step>

          <q-step
            :name="2"
            title="Registrar Usuario de Acceso"
            icon="shopping_cart"
            :done="step > 2"
            :header-nav="step > 2"
          >

            <div class="row">
              <div class="col-12">
                <q-item>
                  <q-input dense outlined class="full-width" v-model="personUser.user.email" label="Correo electrónico*"/>
                </q-item>
              </div>
              <div class="col-12">
                <q-item>
                  <q-input dense outlined class="full-width" v-model="personUser.user.password"
                           label="Contraseña *"/>
                </q-item>
              </div>
              <div class="col-12">
                <q-item>
                  <q-input dense autogrow outlined v-model="personUser.user.confirmPassword" class="full-width"
                           label="Confirmar Contraseña *"/>
                </q-item>
              </div>
            </div>

            <q-stepper-navigation>
              <q-btn rounded @click="registerUser" class="float-right q-mr-md q-mb-md" color="blue"
                     label="Guardar"/>
              <q-btn flat @click="step = 1" color="primary" rounded label="Back" class="q-mr-sm float-right"/>
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

export default defineComponent({
  name: "CommunityType",
  setup() {
    const communityID = ref('f33cd8a1-aff0-49f0-8db9-b992e33b6b73')
    const personUser = ref({
      person: {
        firstName: '',
        lastName: '',
        document: '',
        phone: ''
      },
      user: {
        email: '',
        password: '',
        confirmPassword: '',
        communityId: ''
      }
    })
    const registerUser = () => {
      personUser.value.user.communityId = communityID.value
      console.log(personUser.value)
      api.post('api/users', personUser.value).then(response => {
        console.log(response.data)
      })
    }
    return {
      step: ref(1),
      personUser,
      communities: ['Av. Maragall Nro 267','Av. Maragall Nro 254','Av. Maragall Nro 367','Av. Maragall Nro 567'],
      registerUser
    }
  }
})

</script>

<style scoped>

</style>
