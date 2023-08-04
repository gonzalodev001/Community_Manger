<template>
  <!--   Navbar  -->
  <nav id="navColor" class="navbar navbar-expand px-3 border-bottom">
      <button class="btn" id="sidebar-toggle" type="button" @click="sidebarToggle()" v-on:click="sidebarToggle()">
          <!-- <span class="navbar-toggler-icon"></span>-->
          <i class="bi bi-list"></i>
      </button>
      <div class="navbar-collapse navbar">
          <ul class="navbar-nav">
              <li class="nav-item dropdown">
                  <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                      {{ name }}
                      <img src="../assets/vue.svg" class="avatar img-fluid rounded" alt="">
                  </a>
                  <div class="dropdown-menu dropdown-menu-end">
                      <a href="#" class="dropdown-item">Profile</a>
                      <a href="#" class="dropdown-item">Settings</a>
                      <router-link to="/login" @click="logOut" class="dropdown-item">Logout</router-link>
                  </div>
              </li>
          </ul>
      </div>
  </nav>
  <!--   Navbar End   -->
</template>
<script lang="js">
import { onMounted, ref } from 'vue';
import { useAuthStore } from '../stores/auth';

export default {
  setup() {
    const userAuth = useAuthStore();
    const name = ref(userAuth.user.name);

    function sidebarToggle() {

      document.querySelector("#sidebar").classList.toggle("collapsed");
    }

    onMounted(() => {

      const sidebarToggle = document.querySelector("#sidebar-toggle");
      sidebarToggle.addEventListener("click", function() {
          document.querySelector("#sidebar").classList.toggle("collapsed");
      });
    });

    function logOut() {
      userAuth.logOut();
      //router.push({ path: "login" });
    }

    return{
      sidebarToggle,
      name,
      logOut
    }
  }
}
</script>