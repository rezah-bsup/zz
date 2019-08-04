require('./bootstrap');

import Vue from 'vue';
import App from './components/App';
import VueRouter from 'vue-router';
import routes from './routes';
import store from './store';
import Snotify, {SnotifyPosition} from 'vue-snotify';
import 'vue-snotify/styles/material.css';
import axios from 'axios';

Vue.use(VueRouter);
Vue.use(Snotify, {
    toast: {
        position: SnotifyPosition.leftTop,
        timeout: 5000
    }
});

Vue.component('app-component', App);

new Vue({
    el: '#app',
    router: new VueRouter({
        // mode: 'history',
        routes: routes
    }),
    store,
});
