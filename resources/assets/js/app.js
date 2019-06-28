
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import {router} from './router.js';
import VeeValidate from 'vee-validate'
import VueChartkick from 'vue-chartkick'
import Chart from 'chart.js'

Vue.use(VueChartkick, {adapter: Chart});
Vue.use(VeeValidate);
Vue.prototype.$http = axios;
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


Vue.component('dashboard', require('./components/dashboard.vue'));
Vue.component('verified', require('./components/verified.vue'));

export const eventBus = new Vue();

const app = new Vue({
    el: '#app',
    router
});

