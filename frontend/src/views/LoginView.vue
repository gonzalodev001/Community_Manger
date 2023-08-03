<template>

<div class="d-flex align-items-center form-signin w-100 m-auto ">
  <form class="" @submit.prevent="login">
    <!--<img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">-->
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating">
      <input type="email" class="form-control" id="floatingInput" v-model="email" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" v-model="password" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <div class="form-check text-start my-3">
      <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
      <label class="form-check-label" for="flexCheckDefault">
        Remember me
      </label>
    </div>
    <button class="btn btn-primary w-100 py-2" type="submit" @click="hola">Sign in</button>
    <p class="mt-5 mb-3 text-body-secondary">&copy; 2017–2023</p>
    <p style="color: red"> {{ feedback.value }}</p>
  </form>
</div>

</template>
<script>
import { defineComponent, ref } from 'vue';
import { useAuthStore } from '../stores/auth';
import router  from "../router";

export default defineComponent({
  setup() {
    const authStore = useAuthStore();
    const email = ref('');
    const password = ref('');
    const feedback = ref('');
    //const router = useRouter();

    function hola() {
      console.log("click....");

    }
    console.log(email.value);
    console.log(password.value);
    async function login() {
      console.log(email.value);
      console.log(password.value);
      if(!email.value || !password.value) {
        feedback = "campo vacío email o password";
      } else {
        const payload = { username: email.value, password: password.value };
        console.log(payload);
        const response = await authStore.doLoginAction(payload);
        if(response == false) {
          feedback.value = "Login error";
        } else {
          router.push({ path: "/" });
        }
      }
    }
    return {
      login,
      email,
      password,
      feedback,
      hola
    }
  }
});
</script>
<style :scope>
  .form-signin {
    max-width: 330px;
    padding: 1rem;
  }
  
  .form-signin .form-floating:focus-within {
    z-index: 2;
  }
  
  .form-signin input[type="email"] {
    margin-bottom: -1px;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
  }
  
  .form-signin input[type="password"] {
    margin-bottom: 10px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
  }
</style>
