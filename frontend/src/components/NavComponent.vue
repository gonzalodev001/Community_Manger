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
                      Gonzalo Martinez
                      <img src="../assets/vue.svg" class="avatar img-fluid rounded" alt="">
                  </a>
                  <div class="dropdown-menu dropdown-menu-end">
                      <a href="#" class="dropdown-item">Profile</a>
                      <a href="#" class="dropdown-item">Settings</a>
                      <a href="#" class="dropdown-item">Logout</a>
                  </div>
              </li>
          </ul>
      </div>
  </nav>
  <!--   Navbar End   -->
</template>
<script lang="js">
import { onMounted } from 'vue';
export default {
  setup() {
    function sidebarToggle() {
      console.log("click")
      //const sidebarToggle = document.querySelector("#sidebar-toggle");
      document.querySelector("#sidebar").classList.toggle("collapsed");
    }
    onMounted(() => {
      
      const sidebarToggle = document.querySelector("#sidebar-toggle");
      sidebarToggle.addEventListener("click", function() {
          document.querySelector("#sidebar").classList.toggle("collapsed");
      });
    });

    return{
      sidebarToggle
    }
  }
}
</script>