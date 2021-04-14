<template>

  <v-app>
  <Bar />
 
    <v-main>
      <v-container align="center" class=" lighten-5 mb-6">
        <v-row justify="center">
          <template v-for="tarefas in Tarefa">
            <v-col :key="tarefas" md="2">
              <Tarefas />
            </v-col>
          </template>
        </v-row>
      </v-container>
    </v-main>
  </v-app>
</template>

<script>
import Tarefas from "./components/Tarefa";
import Bar from "./components/Bar";

export default {
  name: "App",

  components: {
    Tarefas,
    Bar
  },

  data: () => ({
    Tarefa: [1, 2, 3, 4, 5, 6, 7, 8, 9],
  }),
};
</script>
