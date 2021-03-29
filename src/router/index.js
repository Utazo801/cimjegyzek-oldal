import { createRouter, createWebHistory } from 'vue-router'
import Home from '../views/Home.vue'
import NewPerson from '../views/NewPerson'

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },

  {
    path: '/login',
    name: 'Login',
    component: () => import('../views/Login.vue')
  },

  { path: "/person/new", component: NewPerson }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
