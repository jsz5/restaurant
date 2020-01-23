/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import 'bootstrap';
import Vue from 'vue'
import Vuetify from 'vuetify';
import vuetifyPL from 'vuetify/lib/locale/pl';
import vuetifyEn from 'vuetify/lib/locale/en';
import 'vuetify/dist/vuetify.min.css'
import Toasted from 'vue-toasted';
import 'material-design-icons-iconfont/dist/material-design-icons.css'
import '@mdi/font/css/materialdesignicons.css'
import Cookies from "./mixins/Cookies";

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
  theme: {
    dark: true,
    themes: {
      dark: {
        primary: '#636262',
        accent: '#0f0f0f',
        secondary: '#000000',
        success: '#4CAF50',
        info: '#2196F3',
        warning: '#FB8C00',
        error: '#FF5252'
      },
    }
  }
};

Vue.use(Vuetify,{
  iconfont: 'md, mdi',
});
const Options = {
  position: 'top-center',
};
Vue.use(Toasted, Options);

Vue.mixin(Cookies);

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
Vue.component('register-form', require('./components/auth/register-form').default);

//HOMEPAGE
Vue.component('contact-form', require('./components/homepage/contact-form').default);
Vue.component('menu-form', require('./components/homepage/menu-form').default);
Vue.component('menu-form-old', require('./components/homepage/menu-form-old').default);
Vue.component('reservation-form', require('./components/homepage/reservation-form').default);
Vue.component('order-form', require('./components/homepage/order-form').default);

//MENU
Vue.component('user-menu', require('./components/menu/user-menu').default);
Vue.component('admin-menu', require('./components/menu/admin-menu').default);
Vue.component('edit-dish', require('./components/menu/edit-dish').default);
Vue.component('create-dish', require('./components/menu/create-dish').default);
Vue.component('user-favourite-dishes', require('./components/menu/user-favourite-dishes').default);

//TABLES
Vue.component('admin-tables-index', require('./components/tables/admin-tables-index').default);
Vue.component('waiter-tables-index', require('./components/tables/waiter-tables-index').default);
Vue.component('waiter-show', require('./components/tables/waiter-show').default);

//WORKERS
Vue.component('workers-index', require('./components/workers/workers-index').default);
Vue.component('workers-create', require('./components/workers/workers-create').default);
Vue.component('workers-edit', require('./components/workers/workers-edit').default);

//DISH CATEGORIES
Vue.component('dish-category-index', require('./components/dishCategories/dish-category-index').default);

//RESERVATION
Vue.component('user-create-reservation', require('./components/reservation/user-create-reservation').default);
Vue.component('user-index-reservation', require('./components/reservation/user-index-reservation').default);
Vue.component('waiter-create-reservation', require('./components/reservation/waiter-create-reservation').default);
Vue.component('waiter-index-reservation', require('./components/reservation/waiter-index-reservation').default);
Vue.component('user-show-reservation', require('./components/reservation/user-show-reservation').default);

//USERS
Vue.component('my-account', require('./components/users/myAccount').default);

//ORDERS
Vue.component('worker-order-index', require('./components/orders/worker-order-index').default);
Vue.component('worker-order-create', require('./components/orders/worker-order-create').default);
Vue.component('worker-order-edit', require('./components/orders/worker-order-edit').default);
Vue.component('order-show', require('./components/orders/order-show').default);
Vue.component('customer-my-orders', require('./components/orders/customer-my-orders').default);
Vue.component('customer-order', require('./components/orders/customer-order').default);


//VOUCHERS
Vue.component('admin-create-voucher', require('./components/vouchers/admin-create-voucher').default);
Vue.component('user-vouchers-index', require('./components/vouchers/user-vouchers-index').default);

//STATISTICS
Vue.component('my-worker-statistics', require('./components/statistics/my-worker-statistics').default);
Vue.component('admin-workers-statistics', require('./components/statistics/admin-workers-statistics').default);
Vue.component('all-statistics', require('./components/statistics/all-statistics').default);
Vue.component('admin-statistics-index', require('./components/statistics/admin-statistics-index').default);
Vue.component('worker-statistics', require('./components/statistics/worker-statistics').default);

Vue.component('homepage', require('./components/homepage').default);

//CONTACT
Vue.component('contact-page', require('./components/contact/contact').default);


const app = new Vue({
  el: '#app',
  vuetify: new Vuetify(opts)
});


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
