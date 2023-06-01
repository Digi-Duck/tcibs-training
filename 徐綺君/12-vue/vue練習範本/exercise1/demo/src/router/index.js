import { createRouter, createWebHashHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import CounterView from '../views/CounterView'
import Btn1View from '../views/Btn1View'
import ExerciseView from '../views/ExerciseView'

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
    path: '/counter',
    name: 'counter',
    component: CounterView,
  },
  {
    path: '/btn1',
    name: 'btn1',
    component: Btn1View,
  },
  {
    path: '/exercise',
    name: 'exercise',
    component: ExerciseView,
  },
  {
    path: '/exercise/start',
    name: 'start',
    component: ()=> import('../views/Start.vue'),
  },
]

const router = createRouter({
  history: createWebHashHistory(),
  routes
})

export default router
