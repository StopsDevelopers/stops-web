import 'bootstrap';

import Vue from 'vue';
import DashboardHeader from './components/dashboard-header';
import DashboardView from './components/dashboard-view';

Vue.component('dashboard-header', DashboardHeader);
Vue.component('dashboard-view', DashboardView);

var app = new Vue({
    delimiters: ['${', '}'],
    el: '#app',
    data: {
        groceryList: [
            { id: 0, text: 'Vegetables' },
            { id: 1, text: 'Cheese' },
            { id: 2, text: 'Whatever else humans are supposed to eat' }
        ]
    }
})
