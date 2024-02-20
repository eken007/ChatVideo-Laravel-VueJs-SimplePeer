import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import axios from 'axios'
import VueAxios from 'vue-axios'
import './index.css'
import store from "./store/store"
import Echo from 'laravel-echo';

window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: "219a1f8debafbc8a8e08",
    wsHost:store.state.host,
    wsPort: 6001,
    cluster: "mt1",
    forceTLS: false,
    disableStats: true,
    authEndpoint :'http://192.168.150.98:8000/api/broadcasting/auth',
    auth:{
        headers: {
            Authorization: `Bearer ${localStorage.getItem('token')}`, 
        }
    },
});

createApp(App).use(router).use(VueAxios, axios).use(store).mount('#app')
