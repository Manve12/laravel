
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 window.Vue = require('vue');
require('./bootstrap');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('image-carousel', require('./components/ImageCarousel.vue').default);
Vue.component('our-benefits', require('./components/Benefits.vue').default);
Vue.component('our-services', require('./components/Services.vue').default);
Vue.component('our-customers', require('./components/Customers.vue').default);
Vue.component('about-us', require('./components/About.vue').default);
Vue.component('contact-us', require('./components/Contact.vue').default);
Vue.component('web-footer', require('./components/Footer.vue').default);

//staff components
Vue.component('handler', require('./components/staff/handler.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',

    mounted(){
      $('.image-list').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 2000,
        arrows:false
      });
    }
});
