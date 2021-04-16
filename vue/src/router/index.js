import Vue from "vue";
import VueRouter from "vue-router";
import Tarefas from "../views/Tarefas.vue";
import Login from "../views/login.vue";

Vue.use(VueRouter);

const routes = [
  {
    path: "/tarefas",
    name: "tarefas",
    component: Tarefas,

  },
  {
    path: "/",
    name: "login",
    component: Login,
  },
];

const router = new VueRouter({
  mode: "history",
  base: process.env.BASE_URL,
  routes,
});

export default router;
