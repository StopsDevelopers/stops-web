import 'bootstrap';

import Vue from 'vue';
import VueRouter from 'vue-router';

import ProfilePage from './pages/profile';
import BusinessPage from './pages/business';
import StatisticsPage from './pages/statistics';
import CodesPage from './pages/codes';
import PaymentPage from './pages/payment';
import AllBusinessPage from './pages/all-business';
import BusinessRegisterOnePage from './pages/business-register-one';
import BusinessRegisterTwoPage from './pages/business-register-two';
import BusinessRegisterThreePage from './pages/business-register-three';

import DashboardHeader from './components/dashboard-header';
import DashboardView from './components/dashboard-view';

Vue.use(VueRouter);
Vue.component('dashboard-header', DashboardHeader);
Vue.component('dashboard-view', DashboardView);

const routes = [
    { path: '/profile', component: ProfilePage },
    { path: '/business', component: BusinessPage, children: [
            { path: "", component: AllBusinessPage },
            { path: 'register/step-1', component: BusinessRegisterOnePage },
            { path: 'register/step-2', component: BusinessRegisterTwoPage},
            { path: 'register/step-3', component: BusinessRegisterThreePage},
        ] },
    { path: '/statistics', component: StatisticsPage },
    { path: '/codes', component: CodesPage },
    { path: '/payment', component: PaymentPage },
];

const router = new VueRouter({
    routes
});

const data = {
    business: {
        register: {
            name: '',
            branch: '',
            category: '',
            subcategory: []
        }
    }
}

const app = new Vue({
    delimiters: ['${', '}'],
    data,
    router
}).$mount('#app')
    