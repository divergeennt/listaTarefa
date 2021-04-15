import Vue from "vue";
import VueRouter from "vue-router";
import Tarefas from "../views/Tarefas.vue";
import Tarefa from "../components/Tarefa";
import Login from "../views/login_.vue";

Vue.use(VueRouter);

const routes = [
  {
    path: "/tarefas",
    name: "tarefas",
    component: Tarefas,
    children: [
      {
        path: "/tarefa",
        name: "login",
        component: Tarefa,
      },
    ],
  },
  {
    path: "/",
    name: "login",
    component: Login,
    children: [
      {
        path: "/login",
        name: "login",
        component: Login,
      },
    ],
  },
];

const router = new VueRouter({
  mode: "history",
  base: process.env.BASE_URL,
  routes,
});

export default router;
