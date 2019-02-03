
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import Vuex from 'Vuex';
Vue.use(Vuex);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Vuex

const store = new Vuex.Store({
    state:{
        item:{}
    },
    mutations:{
        setItem(state, obj){
            state.item = obj;
        }
    }
});

Vue.component('top-component', require('./components/Top.vue'));
Vue.component('panel-component', require('./components/Panel.vue'));
Vue.component('box-component', require('./components/Box.vue'));
Vue.component('page-component', require('./components/Page.vue'));
Vue.component('table-list-component', require('./components/TableList.vue'));
Vue.component('crumbs-component', require('./components/Crumbs.vue'));
Vue.component('modal-component', require('./components/modal/Modal.vue'));
Vue.component('modal-link-component', require('./components/modal/ModalLink.vue'));
Vue.component('form-component', require('./components/Form.vue'));

const app = new Vue({
    el: '#app',
    store
});
