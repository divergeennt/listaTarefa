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
import Vue from "vue";
import VueSweetalert2 from "vue-sweetalert2";
import "sweetalert2/dist/sweetalert2.min.css";
Vue.use(VueSweetalert2);

export default {
  data: () => ({
    show: true,
    cor: "blue",
    Tarefa: [1, 2, 3, 4, 5, 6],
  }),
  created() {
    if (!localStorage.getItem("dadosUsuario")) {
      this.$swal.fire({
        icon: "error",
        title: "",
        text: "Sessão encerrada.",
        footer: "",
      });
      this.$router.push("/");
      return;
    }

    this.dadosUsuario = JSON.parse(localStorage.getItem("dadosUsuario"));

    if (this.dadosUsuario == null) {
      this.$swal.fire({
        icon: "error",
        title: "",
        text: "Sessão encerrada.",
        footer: "",
      });
      this.$router.push("/");
      return;
    }

    axios
      .post("http://127.0.0.1:8000/api/authtoken", null, {
        headers: {
          Authorization: "Bearer " + this.dadosUsuario[0].token,
        },
      })
      .then((res) => {
        if (res.data.erro) {
          this.$swal.fire({
            icon: "error",
            title: "",
            text: "Sessão encerrada.",
            footer: "",
          });
          localStorage.removeItem("dadosUsuario");
          this.$router.push("/");
          return;
        } else {
          this.Tarefas = res.data;
        }
      })
      .catch((error) => {
        console.error(error);
        this.$swal.fire({
          icon: "error",
          title: "",
          text: error,
          footer: "",
        });
        localStorage.removeItem("dadosUsuario");
        this.$router.push("/");
        return;
      });
  },
};
</script>
