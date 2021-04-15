<template>
  <v-app>
    <Bar />
    <v-main>
      <router-view></router-view>
    </v-main>
  </v-app>
</template>

<script>
import Bar from "../components/Bar";

export default {
  name: "Tarefas",

  components: {
    Bar
  },
};
</script>
