<template>
  <router-view />
</template>
<script>
import { defineComponent } from "vue";
import { api } from "boot/axios";

export default defineComponent({
  name: "App",
 beforeCreate() {
    this.$store.dispatch('auth/init')
    const token = this.$store.getters["auth/tokenGetter"]
    console.log(token)
    if (token) {
      api.defaults.headers.common['Authorization'] = 'Bearer ' + token
    }
  }
});
</script>
