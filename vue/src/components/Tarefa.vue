<template>
  <v-container align="center" class=" lighten-5 mb-6">
    <v-row justify="center">
      <template v-for="tarefas in Tarefa">
        <v-col :key="tarefas" md="2">
          <v-card class="mx-auto mt-6" max-width="344">
            <v-card-title>
              {{ tarefas.titulo }}
            </v-card-title>

            <v-card-subtitle>
              {{ tarefas.subtitulo }}
            </v-card-subtitle>
            <v-card-actions>
              <v-btn v-if="tarefas.status == 'Fazendo'" color="orange" text>
                {{ tarefas.status }}
              </v-btn>
              <v-btn v-if="tarefas.status == 'A fazer'" color="red" text>
                {{ tarefas.status }}
              </v-btn>
              <v-btn v-if="tarefas.status == 'Concluído'" color="blue" text>
                {{ tarefas.status }}
              </v-btn>

              <v-spacer></v-spacer>
            </v-card-actions>

            <v-expand-transition>
              <div v-show="show">
                <v-divider></v-divider>

                <v-card-text>
                  {{ tarefas.descricao }}
                </v-card-text>
              </div>
            </v-expand-transition>
          </v-card>
        </v-col>
      </template>
    </v-row>
  </v-container>
</template>

<script>
import axios from "axios";


export default {
  data: () => ({
    show: true,
    Tarefa: [],
  }),
  created() {
    axios
      .get("http://127.0.0.1:8000/api/taferas/listarTarefas/" + 1)
      .then((json) => {
        console.log(json);
        if (json.status == 200) {
          this.Tarefa = json.data;
        } else {
          this.$router.push("/");
        }
      })
      .catch((erro) => {
        console.log(erro);
      });
  },
};
</script>
