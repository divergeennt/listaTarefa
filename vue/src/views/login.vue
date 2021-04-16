<template>
  <v-container fill-height fluid class="spacing-playground pa-16">
    <v-row class="justify-center">
      <v-col cols="12" md="3">
        <v-card elevation="12" outlined>
          <v-card-title primary-title>
            Minhas Tarefas
          </v-card-title>
          <v-container fluid>
            <v-row>
              <v-col cols="12" md="11">
                <v-text-field
                  v-model="dados.login"
                  label="Login*"
                ></v-text-field>
              </v-col>
            </v-row>
            <v-row>
              <v-col cols="12" md="11">
                <v-text-field
                  v-model="dados.senha"
                  label="Senha*"
                ></v-text-field>
                <h5 class="text-start">
                  <a href="/cadastro">Esqueceu sua senha?</a>
                </h5>
              </v-col>
            </v-row>
            <v-row>
              <v-col cols="12" md="11">
                <v-btn
                  color="blue lighten-1"
                  class="float-right"
                  @click="onSubmit"
                  dark
                >
                  Entrar
                </v-btn>
              </v-col>
            </v-row>
          </v-container>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import axios from "axios";
import Vue from "vue";
import VueSweetalert2 from "vue-sweetalert2";

// If you don't need the styles, do not connect
import "sweetalert2/dist/sweetalert2.min.css";

Vue.use(VueSweetalert2);

export default {
  data() {
    return {
      token: null,
      dados: {
        login: null,
        senha: null,
      },
    };
  },

  methods: {
    onSubmit() {
      axios
        .post("http://127.0.0.1:8000/api/usuario/login", this.dados)
        .then((json) => {
          console.log(json);
          //  if (json.status == 200) {
          //   this.$router.push("/tarefas");
          // } else {
          //   this.$router.push("/");
          // }
        })
        .catch((erro) => {
          console.log(erro);
        });
    },
  },
};
</script>
