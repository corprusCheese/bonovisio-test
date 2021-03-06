require('./bootstrap');

import App from "./App.vue";
import Vue from "vue";
import Vuelidate from 'vuelidate'
import VueRouter from 'vue-router'
import routes from './routes';

Vue.use(VueRouter)
Vue.use(Vuelidate);
Vue.config.productionTip = false;

window.Vue = require('vue').default;

const axios = require('axios').default;
const router = new VueRouter({routes});

//router.replace({ path: '/welcome', redirect: '/' })

new Vue({
    render: h => h(App),
    router, axios
}).$mount('#app')

