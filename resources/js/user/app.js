/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

require('./toastr');

/* added plagins*/
// inputmask
window.Inputmask = require('inputmask');
require('./addons/inputs_masks');
// datapicker
import 'jquery-ui/ui/widgets/datepicker.js';
require('./addons/datapicker_setting');
//fancybox
require('@fancyapps/fancybox');

/* static functions*/
require('./addons/sendFormFunctions');


/*pages*/
// product
require('./pages/product');
// profile
require('./pages/profile');
//auth
require('./auth');
// all
require('./pages/all');



// window.Vue = require('vue');


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// Vue.component('linechart-component', require('./components/VueChartComponent.vue').default);
// Vue.component('piechart-component', require('./components/PieChartComponent.vue').default);
// Vue.component('linechartrand-component', require('./components/RandomChartComponent.vue').default);
// Vue.component('socketlinechart-component', require('./components/SocetLineComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app',
// });
