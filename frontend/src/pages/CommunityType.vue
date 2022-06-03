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
            title="Registrar tipo de comunidad"
            icon="shopping_cart"
            :done="step > 1"
            :header-nav="step > 1"
          >
            <div class="row">
              <div class="col-12">
                <q-item>
                  <q-input dense autogrow outlined v-model="community_type.name" class="full-width"
                           label="Tipo de comunidad 1 *"/>
                </q-item>
              </div>

            </div>

            <q-stepper-navigation>
              <q-btn rounded @click="registerCommunityType" class="float-right q-mr-md q-mb-md" color="blue"
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
//import {computed, defineComponent} from 'vue';
import {ref} from 'vue';
import { api } from 'boot/axios';
import {mapGetters} from 'vuex';

export default {
  name: "CommunityType",
  data() {
    return {
      step: 1,
      community_type: {
        name: ''
      }
    }
  },
  methods: {
    registerCommunityType() {
      console.log(this.community_type)
      api.post('api/community_types', this.community_type).then(response => {
        console.log(response.data)
      })
    },
    cancelarRegister () {
      this.community_type.name = ''
    }
    /*this.api.post('api/community_types', this.community_type).then(response => {
      console.log(response.data)
    })*/
  }
 // ...mapGetters('auth', ['tokenGetter']),
  /*setup() {
    const community_type = ref({name: ''})
    let tokens = ref('')
    const tokenUser = computed(() =>
        ...mapGetters('auth', ['tokenGetter'])
    )

    const registerCommunityType = () => {
      console.log(community_type.value)
      tokens = localStorage.getItem('token')
      console.log(tokens)
      //api.defaults.headers.common['Authorization'] = 'Bearer ' + tokens.value
      console.log(api.defaults.headers)
      api.post('api/community_types', community_type.value).then(response => {
        console.log(response.data)
      })
    }
    const cancelarRegister = () => {
      community_type.value.name = ''
    }
    return {
      step: ref(1),
      community_type,
      registerCommunityType,
      cancelarRegister
    }
  }*/
}

</script>

<style scoped>

</style>
