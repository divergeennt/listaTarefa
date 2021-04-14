import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Tarefas.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Homqqe',
    component: Home
  },
  {
    path: '/about',
    name: 'About',
    component: () => import(/* webpackChunkName: "about" */ '../views/Tarefas.vue')
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
