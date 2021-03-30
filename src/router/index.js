import { createRouter, createWebHistory } from 'vue-router'
import Home from '../views/Home.vue'
import NewPerson from '../views/NewPerson'
import UpdatePerson from '../views/UpdatePerson';
import Error404 from "../components/404.vue";

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

  { path: "/person/new", component: NewPerson },
  { path: "/person/update/:id(\\d+)", component: UpdatePerson },
  { path: "/:pathMatch(.*)*", component: Error404, alias: "/error404" },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
