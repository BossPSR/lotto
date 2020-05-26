/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import axios from 'axios'
import VueAxios from 'vue-axios'

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('input-number', require('./components/inputNumberComponent.vue').default);
Vue.component('poy-list', require('./components/PoysList.vue').default);
Vue.component('my-number-set', require('./components/MyNumberSet.vue').default);
Vue.component('huay-uns', require('./components/HuayUns.vue').default);
Vue.component('view-poy', require('./components/ViewPoy.vue').default);
Vue.use(VueAxios, axios)
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});


