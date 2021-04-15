<template>
    <div class="row fixed-center">
        <div class="q-pa-md">
          <q-card bordered class="bg-white my-card" style="width: 350px">
            <q-card-section>
                <div class="text-h6">Bem-vindo ao Portal do Aluno</div>
            </q-card-section>

            <q-separator inset />

            <q-card-section>
              <q-form
              @submit="onSubmit"
              class="q-gutter-md"
              >
              <q-input
                  filled
                  v-model="cpf"
                  label="Informe seu CPF *"
                  mask="###.###.###-##"
                  lazy-rules
                  :rules="[ val => val && val.length > 0 || 'CPF não informado']"
              />

              <q-input
                  filled
                  type="password"
                  v-model="senha"
                  label="Informe sua Senha *"
                  lazy-rules
                  :rules="[
                  val => val !== null && val !== '' || 'Senha não informada']"
              />

              
              <div>
                  <q-btn label="Entrar" type="submit" color="primary"/>
            
                  <q-item clickable>
                      <router-link to="/cadastrologinaluno">Cadastre-se</router-link>
                  </q-item>
              </div>
              </q-form>
            </q-card-section>
            </q-card>
        </div>
    </div>
</template>

<script>
  import axios from 'axios';
  import Vue from 'vue';
  import VueSweetalert2 from 'vue-sweetalert2';
  
  // If you don't need the styles, do not connect
  import 'sweetalert2/dist/sweetalert2.min.css';
  
  Vue.use(VueSweetalert2);

  export default {
    data () {
      return {
        cpf: null,
        senha: null,
        token:null
      }
    },

    methods: {
      onSubmit () {
        axios.post('http://127.0.0.1:8000/api/login',{ cpf: this.cpf, senha: this.senha })
        .then(response => {
          if (response.data.tipo == 'erro') {
              this.$swal.fire({
                  icon: 'error',
                  title: '',
                  text: response.data.mensagem,
                  footer: ''
              })
          }else{
            localStorage.academia_dadosUsuario = JSON.stringify(response.data);
            this.$router.push('/extratofinanceiro') 
          }
        })
        .catch(() => {
            this.$q.notify({
                type: 'negative',
                position: 'bottom',
                message: 'Falha no acesso aos dados.',
                icon: 'report_problem'
            })
        })
      }
    }
  }
</script> 