import { createApp } from 'vue';
import { createPinia } from 'pinia';
import App from './App.vue';
import router  from './router';
import './assets/css/bootstrap.min.css';
import './assets/css/style.css';
import './assets/js/bootstrap.bundle.min.js';
//import './assets/js/script.js';



createApp(App).use(createPinia()).use(router).mount('#app')