

require('./bootstrap');
require('./sb-admin');
window.Vue = require('vue');




import VueRouter from 'vue-router'
Vue.use(VueRouter)



const router = new VueRouter({
   routes,
   
 });



 import {routes} from './routes';

 const router = new VueRouter({
   routes,
   
 })
 
 
 const app = new Vue({
     el: '#app',
     router
 });
