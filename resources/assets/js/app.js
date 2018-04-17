
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./petisiones');


window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('cadena-valor', require('./components/CadenaValor.vue'));
Vue.component('form-area', require('./components/FormArea.vue'));
Vue.component('form-actividad', require('./components/FormActividad.vue'));
Vue.component('delete-object', require('./components/DeleteObject.vue'));
Vue.component('factor-interno', require('./components/FactorInterno.vue'));

const app = new Vue({
    el: '#app'
});
