import { createRouter, createWebHashHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/about',
    name: 'about',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/AboutView.vue')
  },
  {
    path:'/amongus',
    component: () => import('../views/AmongUs.vue') 
  },
  {
    path:'/2',
    component: () => import('../views/2.vue')  
  }
]

const router = createRouter({
  history: createWebHashHistory(),
  routes
})

export default router
