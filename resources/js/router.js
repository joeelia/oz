import Vue from 'vue';
import VueRouter from 'vue-router';

import Home from '@/js/components/Home';

import About from '@/js/components/About';

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            componet: Home
        },
        {
            path: '/about',
            name: 'about',
            componet: About
        }
    ]
});

export default router;