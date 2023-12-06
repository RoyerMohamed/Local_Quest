import './bootstrap';
import { createApp } from 'vue';
import App  from './App.vue'; 
import { createPinia } from 'pinia';
import router from './router'
import piniaPluginPersistedstate from 'pinia-plugin-persistedstate'
//bootstrap
import "bootstrap/dist/css/bootstrap.min.css"
import "bootstrap"


const app = createApp(App);
const pinia = createPinia();
pinia.use(piniaPluginPersistedstate)

app.use(pinia)
app.use(router)
app.mount('#app')

