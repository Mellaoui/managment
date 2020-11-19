/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('admin-lte')



import Vue from 'vue'

import { Form, HasError, AlertError } from 'vform'

import VueProgressBar from 'vue-progressbar'

import VueRouter from 'vue-router'

import Swal from 'sweetalert2'

import Datepicker from 'vuejs-datepicker'

import {store} from './store/store'

import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';

window.Vue = require('vue');

window.Form =Form ;

window.Swal = Swal;

window.toast = Swal;

let Fire = new Vue();// or window.Fire = new Vue();

window.Fire = Fire;

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)


Vue.use(VueRouter)

let routes = [
    { path: '/home', component: require('./components/Dashboard.vue').default },
    { path: '/developer', component: require('./components/Developer.vue').default },
    { path: '/tables', component: require('./components/Table.vue').default },
    {path: '/list', component: require('./components/List.vue').default},
    {path: '/attandence', component: require('./components/Attandence.vue').default},
    {path: '/new_user', component: require('./components/New_user.vue').default},
    {path: '/patient/:id(\\d+)', component: require('./components/Profile.vue').default}
]

  const router = new VueRouter({
    mode: "history",
    routes // short for `routes: routes`
  })


Vue.filter('update',function(text){
  return text.touppercase();
});  //not used yet in this application 

// this part is for progress bar style
const options = {
  color: '#09e67b',
  failedColor: '#874b4b',
  thickness: '5px',
  transition: {
    speed: '0.2s',
    opacity: '0.6s',
    termination: 300
  },
  autoRevert: true,
  location: 'left',
  inverse: false
}

Vue.use(VueProgressBar,options)


//toaster

const toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  onOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component(
  'passport-clients',
  require('./components/passport/Clients.vue').default
);

Vue.component(
  'passport-authorized-clients',
  require('./components/passport/AuthorizedClients.vue').default
);

Vue.component(
  'passport-personal-access-tokens',
  require('./components/passport/PersonalAccessTokens.vue').default
);


Vue.use(ElementUI);

const app = new Vue({
    el: '#app',
    store,
    router
});
