import 'bootstrap';

import Vue from 'vue';
import TodoItem from './components/todo-item';
import DashboardHeader from './components/dashboard-header';

Vue.component('todo-item', TodoItem);
Vue.component('dashboard-header', DashboardHeader);

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
