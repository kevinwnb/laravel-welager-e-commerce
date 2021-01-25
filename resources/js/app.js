/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('jquery-zoom');

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

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('nav-component', require('./components/NavComponent.vue').default);
Vue.component('welcome-products-component', require('./components/WelcomeProductsComponent.vue').default);
Vue.component('login-component', require('./components/LoginComponent.vue').default);
Vue.component('register-component', require('./components/RegisterComponent.vue').default);
Vue.component('search-component', require('./components/SearchComponent.vue').default);
Vue.component('browse-component', require('./components/BrowseComponent.vue').default);
Vue.component('product-component', require('./components/ProductComponent.vue').default);
Vue.component('cart-component', require('./components/CartComponent.vue').default);
Vue.component('reviews-component', require('./components/ReviewsComponent.vue').default);
Vue.component('scrollable-modal-component', require('./components/ScrollableModalComponent.vue').default);
Vue.component('sign-in-modal-component', require('./components/SignInModalComponent.vue').default);
Vue.component('register-modal-component', require('./components/RegisterModalComponent.vue').default);
Vue.component('buy-now-modal-component', require('./components/BuyNowModalComponent.vue').default);
Vue.component('buy-now-component', require('./components/BuyNowComponent.vue').default);
Vue.component('address-management-modal-component', require('./components/AddressManagementModalComponent.vue').default);
Vue.component('payment-method-management-modal-component', require('./components/PaymentMethodManagementModalComponent.vue').default);
Vue.component('add-payment-method-modal-component', require('./components/AddPaymentMethodModalComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
