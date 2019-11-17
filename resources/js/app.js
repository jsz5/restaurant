/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import Vue from 'vue'
import Vuetify from 'vuetify';
import vuetifyPL from 'vuetify/lib/locale/pl';
import vuetifyEn from 'vuetify/lib/locale/en';
import 'vuetify/dist/vuetify.min.css'


require('./bootstrap');

window.Vue = require('vue');


const opts = {
  iconfont: 'md, mdi',
  breakpoint: {
    thresholds: {
      xs: 360,
      sm: 500,
      md: 839,
      lg: 1024,
      xl: 1199,
    },
    scrollbarWidth: 10,
  },
  lang: {
    locales: {vuetifyPL, vuetifyEn},
    current: 'vuetifyPL',
  },
};

Vue.use(Vuetify);


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//PARTIALS
Vue.component('ui-header', require('./components/partials/ui-header').default);
Vue.component('ui-footer', require('./components/partials/ui-footer').default);

//AUTH
Vue.component('login-form', require('./components/auth/login-form').default);
Vue.component('reset-password-form', require('./components/auth/reset-password-form').default);
Vue.component('forgot-password-mail', require('./components/auth/forgot-password-mail').default);

//MENU
Vue.component('user-menu', require('./components/menu/user-menu').default);
Vue.component('admin-menu', require('./components/menu/admin-menu').default);
Vue.component('edit-dish', require('./components/menu/edit-dish').default);
Vue.component('create-dish', require('./components/menu/create-dish').default);

//TABLES
Vue.component('admin-tables-index', require('./components/tables/admin-tables-index').default);
Vue.component('waiter-tables-index', require('./components/tables/waiter-tables-index').default);
Vue.component('waiter-show', require('./components/tables/waiter-show').default);

//WORKERS
Vue.component('workers-index', require('./components/workers/workers-index').default);
Vue.component('workers-create', require('./components/workers/workers-create').default);
Vue.component('workers-edit', require('./components/workers/workers-edit').default);

//DISH CATEGORIES
Vue.component('dish-category-index', require('./components/dishCategories/dish-category-index').default);dishCategorydishCategory


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


const app = new Vue({
  el: '#app',
  vuetify: new Vuetify(opts),
});