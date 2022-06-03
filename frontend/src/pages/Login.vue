<template>
  <q-layout>
    <q-page-container>
      <q-page class="flex bg-image flex-center">
        <q-card v-bind:style="$q.screen.lt.sm?{'width': '80%'}:{'width':'30%'}">
          <q-card-section>
            <q-avatar size="103px" class="absolute-center shadow-10">
              <img src="~assets/profile.svg" alt="profile">
            </q-avatar>
          </q-card-section>
          <q-card-section>
            <div class="text-center q-pt-lg">
              <div class="col text-h6 ellipsis">
                Log in
              </div>
            </div>
          </q-card-section>
          <q-card-section>
            <q-form class="q-gutter-md" @submit.prevent="submitForm">
              <q-input filled v-model="login.username" label="Username" model-value=""/>

              <q-input type="password" filled v-model="login.password" label="Password" model-value=""/>

              <div>
                <q-btn label="Login" type="submit" color="primary"/>
              </div>
            </q-form>
          </q-card-section>
        </q-card>
      </q-page>
    </q-page-container>
  </q-layout>
</template>

<script>

import { useQuasar } from 'quasar'
import {mapActions, mapGetters} from 'vuex'

export default {
  name: 'Login',
  data() {
    return {
      login: {
        username : '',
        password: ''
      }
    }
  },
  computed: {
    ...mapGetters('auth', ['tokenGetter'])
  },
  methods: {
    ...mapActions('auth', ['doLoginAction']),
    async submitForm () {
      const $q = useQuasar()
      try {
        await this.doLoginAction(this.login)
        //const toPath = this.$router.|| '/'
        console.log('mapGetter-----------')
        console.log(this.tokenGetter)
        await this.$router.push('/')
      } catch (e) {
        $q.notify({
          type: 'negative',
          message: 'Hola mundo'
        })
      }
    }
  },
  mounted() {
    const $q = useQuasar()
  }

}
</script>

<style>
.bg-image {
  background-image: linear-gradient(135deg, #7028e4 0%, #e5b2ca 100%);
}
</style>
