import { createRouter, createWebHistory } from 'vue-router';

import Home from '../views/Home.vue';


export default createRouter({
    history: createWebHistory("/dashboard-admin"),
    routes: [
        {
            { 
                path: '/', 
                component: Home 
            },
        },
    ]
});