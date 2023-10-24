import { createRouter, createWebHistory } from 'vue-router';
import {
  HomeView,
  AddProductView
} from '../views';

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/addproduct',
      name: 'addProduct',
      component: AddProductView
    }
  ]
})

export default router
