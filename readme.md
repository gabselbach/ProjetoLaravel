
# Projeto CRUD em Laravel
Desenvolvimento de um simples projeto CRUD ( cadastro de usuários) utilizando a banco de dados com o MySQL e a linguagem PHP com o framework Laravel 5.8.

### Requisitos:
* Laravel 5.6+
* Composer
* MYSQL

Caso não tenha o homestead instalado assim como será necessário mais algumas coisas
que podem ser conferidas no próprio site do https://laravel.com/docs/5.8


### Configuração do Projeto:
* crie uma database
* Renomeie o arquivo .env.example só para .env e configure os seguintes campos:
  - DB_DATABASE=
  - DB_USERNAME=
  - DB_PASSWORD=

##### Dentro da pasta do projeto execute:
* composer install
* php artisan key:generate

Para executar as tabelas do banco execute:
* php artisan migrate

Neste projeto está configurado o arquivo Seeder, caso queria o banco já populado para teste, execute:
* composer dump-autoload
* php artisan migrate:fresh --seed

#### É necessário configurar a pasta storage para que as imagens apareçam para isso execute:</h4>
* php artisan storage:link

Para rodar o projeto aconselho a utilizar o próprio serve do artisan, para isso use o comando
* php artisan serve

 é mostrado em que endereço ele foi startado, sera algo como: 127.0.0.1:8000

#### Implementado:
 * Opções sobre usuários:
   - [x] Inserção de informações
   - [x] Exclusão
   - [x] Alteração
   - [x] Visualização
   - [ ] Inserção de múltiplas fotos
   - [ ] Login
 