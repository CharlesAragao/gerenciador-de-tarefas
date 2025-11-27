# Gerenciador de Tarefas

## 📌 Sobre o Projeto

O **Gerenciador de Tarefas** é uma aplicação simples desenvolvida para permitir que o usuário cadastre, liste, edite e exclua tarefas de forma prática. Ele utiliza **SQLite** como banco de dados local, garantindo leveza e facilidade de uso.

O objetivo do projeto é demonstrar conhecimentos básicos de desenvolvimento web, integração com banco de dados, boas práticas de organização de código e criação de uma interface limpa e funcional.

---

## 🚀 Funcionalidades

* Adicionar novas tarefas
* Listar todas as tarefas cadastradas
* Editar tarefas existentes
* Excluir tarefas
* Exibir mensagens de sucesso e erro
* Banco de dados local utilizando **SQLite**
* Estilização com **CSS puro**

---

## 🗂️ Estrutura do Projeto

```
crud-ap2/
├── actions/
│   └── processa_adicionar.php
│   └── processa_editar.php
├── css/
│   └── style.css
├── sql/
│   └── schema.sql
├── src/
│   ├── adicionar.php
│   ├── conexao.php
│   ├── database.db
│   ├── editar.php
│   ├── excluir.php
│   ├── index.php
│   └── utils.php
└── README.md
```

*Observação: Estrutura pode variar dependendo da sua organização.*

---

## 🧰 Tecnologias Utilizadas

* **PHP 8+**
* **SQLite (banco de dados local)**
* **HTML5**
* **CSS3**
* **JavaScript**

---

## ⚙️ Como Executar o Projeto

1. Instale e abra o **XAMPP**.
2. Certifique-se de que o **Apache** está ativo.
3. Coloque a pasta do projeto em:

   ```
   htdocs/gerenciador-de-tarefas/
   ```
4. Abra no navegador:

   ```
   http://localhost/gerenciador-de-tarefas/index.php
   ```
5. O banco SQLite (**tarefas.db**) será acessado automaticamente pelo PHP.

---

## 📝 Melhorias Futuras

* Adicionar sistema de login
* Criar categorias de tarefas
* Adicionar modo escuro
* Filtrar tarefas por status

---

## 👤 Autor

**Charles Aragão**

---

## 📄 Licença

Este projeto é de uso livre para fins acadêmicos e de estudo.
