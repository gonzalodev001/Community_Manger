<template>
  <div class="d-flex align-items-center justify-content-center min-vh-100 bg-light">
    <div class="card shadow-sm p-4" style="width: 100%; max-width: 400px;">
      <form @submit.prevent="login">
    <!-- <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->

        <h1 class="h3 mb-3 fw-normal text-center">Please Sign In</h1>

        <div class="form-floating mb-3">
          <input type="email" class="form-control" id="floatingInput" v-model="email" placeholder="name@example.com">
          <label for="floatingInput">Email address</label>
        </div>

        <div class="form-floating mb-3">
          <input type="password" class="form-control" id="floatingPassword" v-model="password" placeholder="Password">
          <label for="floatingPassword">Password</label>
        </div>

        <div class="form-check text-start mb-3">
          <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
          <label class="form-check-label" for="flexCheckDefault">
            Remember me
          </label>
        </div>

        <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
        
        <p class="mt-3 text-center" style="color: red">{{ feedback.value }}</p>
        <p class="mt-5 mb-3 text-body-secondary text-center">&copy; 2022–2024</p>
      </form>
    </div>
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

    async function login() {
      if(!email.value || !password.value) {
        feedback = "campo vacío email o password";
      } else {
        const payload = { username: email.value, password: password.value };
        const response = await authStore.doLoginAction(payload);
        if(response) {
          router.push({ name: "Dashboard" });
        } else {
          feedback.value = "Login error";
        }
      }
    }
    return {
      login,
      email,
      password,
      feedback,
    }
  }
});
</script>
<style scope>
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

  .form-signin {
    max-width: 400px;
  }

  .card {
    border-radius: 10px;
    border: none;
  }

  .form-floating > .form-control {
    border-radius: 5px;
  }

  .btn-primary {
    background-color: #007bff;
    border-color: #007bff;
  }

  .btn-primary:hover {
    background-color: #0056b3;
    border-color: #004085;
  }

  .text-body-secondary {
    color: #6c757d !important;
  }
</style>
