
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');

import VeeValidate from 'vee-validate';
Vue.use(VeeValidate);

import VueCarousel from 'vue-carousel';
Vue.use(VueCarousel);

import VueSweetalert2 from 'vue-sweetalert2';
Vue.use(VueSweetalert2);

import VueMask from 'v-mask'
Vue.use(VueMask);

import BootstrapVue from 'bootstrap-vue';
Vue.use(BootstrapVue);

import Vuetify from 'vuetify';
import 'vuetify/dist/vuetify.min.css';
Vue.use(Vuetify);

import VuetifyGoogleAutocomplete from 'vuetify-google-autocomplete';
Vue.use(VuetifyGoogleAutocomplete, {
    apiKey: 'AIzaSyDyJUwEpWPLTDZrX9TVeq5m8vGQScqyZCA',
});

/*vuex*/
import store from './store'


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Vue.component('example-component', require('./components/ExampleComponent.vue'));

import router from './router';

const app = new Vue({
    el: '#app',
    router,
    store
});

