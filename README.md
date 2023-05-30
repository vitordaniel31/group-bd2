<h4 align="center">
 group-bd2
</h4>

<p align="center">
 <a href="#-sobre-o-projeto">Sobre</a> •
 <a href="#-funcionalidades">Funcionalidades</a> •
 <a href="#-como-executar-o-projeto">Como executar</a> •
 <a href="#-tecnologias">Tecnologias</a> •
 <a href="#-autor">Autor</a> •
</p>

## 💻 Sobre o Repositório

<p aling="justify">
Repositório reservado para o desenvolvimento das atividades atribuidas na matéria de Projeto e Administração de Banco de Dados utilizando PHP.
</p>

---

## ⚙️ Funcionalidades

- [x] Conexão ODBC com o banco de Dados;
- [x] Conexão ORM com o banco de dados;
- [x] Povoamento de todas as tabelas do banco de dados com dados gerados randomicamente e com a possibilidade de configurar quantas linhas serão geradas;
- [x] Procedimento;
- [x] Tempo de consulta.

<!-- 

---

## 🚀 Como executar o projeto

**O tutorial abaixo assume que você já tenha instalado o**[Docker](https://www.docker.com/)**
 em sua máquina.\**

### Instalação

```bash
git clone https://github.com/vitordaniel31/sisvenda.git

cd sisvenda

docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs &&
    cp .env.example .env &&
    php artisan key:generate && 
    npm install

```

### Inicialização

```bash
docker compose up -d

docker exec -it sisvenda-laravel-1 bash

npm run dev

```

Aplicação Local (<http://localhost:8000>) -->

---

## 🛠 Tecnologias

As seguintes ferramentas foram usadas na construção do projeto:

- **[GitHub](https://github.com/)**
- **[MySQL](https://www.mysql.com/)**
- **[PHP](https://www.php.net/)**
- **[Fzaninotto - gerador de dados faker](https://github.com/fzaninotto/Faker)**
- **[Eloquent:](https://laravel.com/docs/5.0/eloquent)** 

<p align="justify">
O Eloquent ORM é uma parte essencial do Laravel, um framework PHP popular. Ele simplifica a interação com bancos de dados relacionais, permitindo que os desenvolvedores mapeiem facilmente modelos de objetos para tabelas de banco de dados. Com o Eloquent, as operações CRUD podem ser realizadas de forma intuitiva, usando métodos simples.
Uma das grandes vantagens do Eloquent é a capacidade de definir relacionamentos entre os modelos, facilitando a manipulação de dados relacionados. Além disso, ele oferece recursos avançados, como consultas fluente, que permitem construir consultas complexas usando uma sintaxe encadeada e legível.
No geral, o Eloquent ORM simplifica o trabalho com banco de dados no Laravel, proporcionando uma abstração poderosa e eficiente. Ele aumenta a produtividade dos desenvolvedores, permitindo que se concentrem na lógica do aplicativo em vez de lidar com detalhes de baixo nível do banco de dados.
</p>

---

## ✒️ Autores

<table>
  <tr>
    <td align="center"><a><img style="border-radius: 50%;" src="https://avatars.githubusercontent.com/u/74608458?v=4" width="100px;" alt=""/><a href="https://github.com/joseP1432" title=""><br /><sub><b> José Marques</b></sub></a><br /></td>
    <td align="center"><a><img style="border-radius: 50%;" src="https://avatars.githubusercontent.com/u/53538678?v=4" width="100px;" alt=""/><a href="https://github.com/ketwy"><br /><sub><b>Ketlly Azevedo</b></sub></a><br /></td>
    <td align="center"><a><img style="border-radius: 50%;" src="https://avatars.githubusercontent.com/u/51799954?v=4" width="100px;" alt=""/><a href="https://github.com/vitordaniel31" title=""><br /><sub><b>Vitor Daniel</b></sub></a><br /></td>

  </tr>
</table>

