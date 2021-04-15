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
                  v-model="login"
                  label="Login*"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Login não informado',
                  ]"
                ></v-text-field>
              </v-col>
            </v-row>
            <v-row>
              <v-col cols="12" md="11">
                <v-text-field
                  type="password"
                  v-model="senha"
                  label="Informe sua Senha *"
                  lazy-rules
                  :rules="[
                    (val) =>
                      (val !== null && val !== '') || 'Senha não informada',
                  ]"
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
                  @submit="onSubmit"
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
      login: null,
      senha: null,
      token: null,
    };
  },

  methods: {
    onSubmit() {
      axios
        .post("http://127.0.0.1:8000/api/login", {
          login: this.login,
          senha: this.senha,
        })
        .then((response) => {
          if (response.data.tipo == 'erro') {
              this.$swal.fire({
                  icon: 'error',
                  title: '',
                  text: response.data.mensagem,
                  footer: ''
              })
          }else{
          localStorage.academia_dadosUsuario = JSON.stringify(response.data);
          this.$router.push("/tarefas");
          }
        })
        .catch(() => {
          this.$q.notify({
            type: "negative",
            position: "bottom",
            message: "Falha no acesso aos dados.",
            icon: "report_problem",
          });
        });
    },
  },
};
</script>
