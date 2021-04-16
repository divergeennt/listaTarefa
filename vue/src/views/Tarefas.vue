<template>
  <v-app>
    <Bar />
    <v-main>
    <Tarefa />
      <router-view></router-view>
    </v-main>
  </v-app>
</template>

<script>
import Bar from "../components/Bar";
import Tarefa from "../components/Tarefa";

export default {
  name: "Tarefas",

  components: {
    Bar,
    Tarefa
  },
};
</script>
