import { createRouter, createWebHistory } from 'vue-router'
import { useAuthStore } from '../store/auth.js'
import { getActivePinia } from 'pinia'

import Home from '../views/Home.vue'
import Login from '../views/Login.vue'
import Profile from '../views/Profile.vue'

const routes = [
  { 
    path: '/', 
    component: Home 
  },
  { 
    path: '/login', 
    component: Login 
  },
  {
    path: '/profile',
    component: Profile,
    meta: { requiresAuth: true }
  }
];

const router = createRouter({
  history: createWebHistory(),
  routes
});

router.beforeEach((to, from, next) => {

  const pinia = getActivePinia()
  if (!pinia) {
    throw new Error('Pinia is not initialized')
  }

  const authStore = useAuthStore(pinia)

  // if (to.meta.requiresAuth) {
  //   if (!authStore.userDetails) {
  //     next('/login');
  //   } else {
  //     next();
  //   }
  // } else {
  //   next();
  // }

  if(!to.meta.requiresAuth) return next()
  if(authStore.userDetails) return next()
  return next('/login')
});

export default router
