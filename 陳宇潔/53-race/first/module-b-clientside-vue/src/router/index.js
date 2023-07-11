import { createRouter, createWebHistory } from 'vue-router';
import AddProject from '../views/AddProject.vue';
import CanvasTool from '../views/CanvasTool.vue';

const routes = [
  {
    path: '/',
    name: 'add',
    component: AddProject,
  },
  {
    path: '/canvas',
    name: 'canvas',
    component: CanvasTool,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
  strict: false,
});

export default router;
