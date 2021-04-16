<template>
  <v-container align="center" class=" lighten-5 mb-6">
    <v-row justify="center">
      <template v-for="tarefa in Tarefa">
        <v-col :key="tarefa" md="2">
          <v-card class="mx-auto mt-6" max-width="344">
            <v-card-title>
              {{ tarefa.titulo }}
            </v-card-title>

            <v-card-subtitle>
              {{ tarefa.subtitulo }}
            </v-card-subtitle>
            <v-card-actions>
              <v-btn v-if="tarefa.status == 'Fazendo'" color="orange" text>
                {{ tarefa.status }}
              </v-btn>
              <v-btn v-if="tarefa.status == 'A fazer'" color="red" text>
                {{ tarefa.status }}
              </v-btn>
              <v-btn v-if="tarefa.status == 'Concluído'" color="blue" text>
                {{ tarefa.status }}
              </v-btn>

              <v-spacer></v-spacer>
            </v-card-actions>

            <v-expand-transition>
              <div v-show="show">
                <v-divider></v-divider>

                <v-card-text>
                  {{ tarefa.descricao }}
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
