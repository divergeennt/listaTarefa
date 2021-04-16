# listaTarefa

<h2>Configurando a Aplicação</h2>

<h3>Docker / Laravel</h3>

<p>
A Api em Laravel se contra dentro do diretorio "DockerServer/sistemas/api"

Os comandos de Docker foram simplificados com o PHONY que se contra dentro da pasta DockerServer

</p>

<p>
*Tenha o docker instalado*

Entre no diretorio da pasta do projeto "/listaTarefa/DockerServer" em seguida rode os comandos</p>

### Irá buildar a aplicação seguindos as configuraçoes do docker-compose.yml que se encontra em "DockerServer/instalacao"

```
make build
```

### Criará os containers e servidores

```
make up
```

### entra no container usando

```
 make php
```

### entre no diretorio da aplicação

```
 cd /var/www/api
```

### Execute

```
composer install
```

### rodar as migrations

```
php artisan migrate
```

### rodar as Seed na ordem por causa da Foreign key

```
php artisan db:seed --class=Usuario
php artisan db:seed --class=Tarefas
```

### e start o servidor, rode:

```
php artisan serve --host 0.0.0.0
```

<h3>vue</h3>

### tenha o Node.js intaado na maquina

### Execute

```
npm install
```

```
npm run serve
```

<p>usuarios do sistema </p>

usuario1
123

usuario2
1234

<h3>Rotas disponiveis</h3>

<p>
POST
http://127.0.0.1:8000/api/usuario/login

GET
http://localhost:8000/api/taferas/listarTarefas/{id}
</p>
