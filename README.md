<div align="center">

<h1 align="center">
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg" width="36" height="36" alt="PHP" />
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/codeigniter/codeigniter-plain.svg" width="36" height="36" alt="CodeIgniter" />
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original.svg" width="36" height="36" alt="MySQL" />
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/nginx/nginx-original.svg" width="36" height="36" alt="Nginx" />
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/docker/docker-original.svg" width="36" height="36" alt="Docker" />
  <br />
  API REST — CodeIgniter 3
</h1>

<p align="center">
  <img src="https://img.shields.io/badge/PHP-8.1-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP 8.1" />
  <img src="https://img.shields.io/badge/CodeIgniter-3.1.13-EE4326?style=for-the-badge&logo=codeigniter&logoColor=white" alt="CodeIgniter 3" />
  <img src="https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL 8" />
  <img src="https://img.shields.io/badge/Nginx-1.27_Alpine-009639?style=for-the-badge&logo=nginx&logoColor=white" alt="Nginx" />
  <img src="https://img.shields.io/badge/Docker-Ready-2496ED?style=for-the-badge&logo=docker&logoColor=white" alt="Docker Ready" />
</p>

</div>

---

## 📝 Descrição

API REST de alta performance desenvolvida com o framework **CodeIgniter 3** em **PHP 8.1**, voltada para o gerenciamento de estudantes, controle acadêmico e consultas em tempo real, equipada com console interativo de testes web, autenticação de usuários e ambiente containerizado com **Docker**.

<cite>API REST para cadastro, consulta, atualização e remoção de registros acadêmicos e estudantes com integração MySQL e console interativo.</cite>

---

## 🚦 Status do Projeto

<h4 align="center"> ✅ API REST CodeIgniter 3 🚀 Concluído ⚙️ </h4>

---

## 🏗️ Arquitetura do Projeto

- **Tipo:** 🔌 **API REST (Backend)**
- **Explicação:** Arquitetura orientada a serviços RESTful estruturada sobre o padrão MVC do CodeIgniter 3. As rotas HTTP mapeiam diretamente para os controladores REST em [`application/controllers/Api.php`](./application/controllers/Api.php), que realizam validação, controle de CORS, execução segura de queries através do Query Builder e entrega de payloads padronizados em JSON. A infraestrutura é orquestrada por **Docker Compose** com **PHP 8.1 FPM**, **Nginx** como proxy reverso, **MySQL 8.0** com seed automático e **PHPMyAdmin**.

---

## 🔥 Pré-requisitos

- **PHP 7.4+** ou **PHP 8.1+**
- **Composer 2.0+**
- **MySQL 5.7+** ou **MySQL 8.0+**
- **Docker 24.0+** e **Docker Compose v2+** (opcional para execução em containers)

---

## 🚀 Tecnologias Utilizadas

- **Linguagem:** PHP `8.1` / `7.4`
- **Framework:** CodeIgniter `3.1.13`
- **Banco de Dados:** MySQL `8.0` / MariaDB
- **Servidor Web & Proxy Reverso:** Nginx `1.27-alpine` com FastCGI e Gzip
- **Extensões PHP:** `mysqli`, `pdo_mysql`, `mbstring`, `intl`, `zip`, `curl`, `opcache`, `gd`
- **Padrões:** RESTful API, MVC, Query Builder (anti-SQL Injection), CORS nativo e Ambiente Híbrido (`.env` Local/Docker)

---

## 🔨 Funcionalidades

- 📚 **Consulta Completa de Estudantes (`GET /api/get_estudantes`):** Retorno estruturado em JSON com paginação e totalizadores.
- 🔍 **Consulta Individual por Matrícula (`GET /api/get_estudante/{matricula}`):** Busca direta por chave primária com tratamento para registro não encontrado (HTTP 404).
- ✍️ **Cadastro de Estudantes (`POST /api/post_estudante`):** Inclusão com validação de campos obrigatórios e prevenção de matrículas duplicadas (HTTP 409).
- 🔄 **Atualização Cadastral (`PUT /api/put_estudante`):** Atualização segura via JSON, POST ou parâmetros REST.
- 🗑️ **Exclusão Segura (`DELETE /api/delete_estudante`):** Remoção protegida utilizando Query Builder parametrizado.
- 🔐 **Autenticação Demo (`POST /api/login`):** Emissão de token de sessão para os perfis administrativos de demonstração.
- 🩺 **Healthcheck Contínuo (`GET /api/health`):** Verificação de status do servidor e conexão ativa com o banco de dados.
- 💻 **Console Web Interativo (`/`):** Painel visual integrado para inspecionar, disparar requisições e visualizar o JSON retornado em tempo real sem depender de ferramentas externas.

---

## 🎯 Sobre o Projeto

Sistema desenvolvido demonstrando boas práticas de desenvolvimento, arquitetura limpa e organização de código, com foco em escalabilidade e manutenção.

---

## 📸 Preview do Projeto

🚧 Preview não disponível no projeto.

---

## 📁 Documentação do Projeto

O repositório conta com documentação completa de execução e testes na pasta [`docs/`](./docs):

- 📘 **[`docs/COMO_EXECUTAR.md`](./docs/COMO_EXECUTAR.md):** Guia rápido de decisão entre ambiente Local e Docker, tabela de URLs e acessos demo.
- 📗 **[`docs/COMO_EXECUTAR_LOCAL.md`](./docs/COMO_EXECUTAR_LOCAL.md):** Passo a passo detalhado para execução local com PHP CLI ou Laragon.
- 🐳 **[`docs/COMO_EXECUTAR_DOCKER.md`](./docs/COMO_EXECUTAR_DOCKER.md):** Guia completo da stack containerizada (`ci_nginx`, `ci_app`, `ci_mysql`, `ci_phpmyadmin`).
- 🔐 **[`docs/ACESSOS_TESTES.md`](./docs/ACESSOS_TESTES.md):** Credenciais de teste, tabela de endpoints e comandos de validação.

### 🔌 Tabela de Endpoints da API

| Método | Endpoint | Descrição |
| :---: | :--- | :--- |
| `GET` | `/api/health` | Healthcheck do serviço e conexão MySQL |
| `POST` | `/api/login` | Autenticação dos usuários demo e emissão de token |
| `GET` | `/api/demo_users` | Lista de credenciais de teste disponíveis |
| `GET` | `/api/get_estudantes` | Listagem completa de estudantes cadastrados |
| `GET` | `/api/get_estudante/{matricula}` | Consulta individual de estudante por matrícula |
| `POST` | `/api/post_estudante` | Cadastro de novo estudante |
| `PUT` | `/api/put_estudante` | Atualização cadastral de estudante |
| `DELETE` | `/api/delete_estudante` | Exclusão de estudante do banco de dados |

---

## 💻 Comandos

### Execução Local (PHP CLI):

```bash
cp .env.example .env
composer install
php -S 127.0.0.1:8000
```

### Execução com Docker:

```bash
cp .env.example .env
docker compose up -d --build
```

> ⚠️ Estes são comandos básicos. Verifique no projeto arquivos como:
> README.md, COMO_EXECUTAR.md ou docs/ para instruções completas.

---

## 🧱 Estrutura do Projeto

```text
api_codeigniter/
├── application/
│   ├── config/
│   │   ├── autoload.php          # Configuração de auto-carregamento (database, helpers)
│   │   ├── config.php            # Configurações globais e base_url dinâmica
│   │   ├── database.php          # Conexão MySQL com suporte a variáveis de ambiente
│   │   └── routes.php            # Mapeamento de rotas amigáveis da API REST
│   ├── controllers/
│   │   ├── Api.php               # Controlador RESTful com todos os endpoints
│   │   └── Welcome.php           # Controlador da interface web / console
│   ├── helpers/
│   │   └── Api_helper.php        # Funções auxiliares de acesso ao banco e auth
│   └── views/
│       └── welcome_message.php   # Console interativo web e documentação da API
├── docker/
│   ├── mysql/
│   │   └── init.sql              # Script SQL de inicialização e seed automático
│   ├── nginx/
│   │   └── default.conf          # Nginx com resolver dinâmico, FastCGI e Gzip
│   ├── php/
│   │   └── local.ini             # Configurações de performance do PHP (OPcache, Realpath)
│   └── scripts/
│       └── start-app.sh          # Script de bootstrap e permissões de cache
├── docs/
│   ├── ACESSOS_TESTES.md         # Documentação de testes e acessos
│   ├── COMO_EXECUTAR.md          # Guia comparativo de execução
│   ├── COMO_EXECUTAR_DOCKER.md   # Guia detalhado para Docker Desktop
│   └── COMO_EXECUTAR_LOCAL.md    # Guia para ambiente local
├── system/                       # Núcleo do framework CodeIgniter 3
├── .dockerignore                 # Exclusões de contexto do Docker
├── .env.example                  # Variáveis de ambiente (blocos LOCAL e DOCKER)
├── .gitignore                    # Regras de exclusão do Git
├── composer.json                 # Definições do projeto e dependências PHP
├── docker-compose.yml            # Orquestração app, nginx, mysql e phpmyadmin
├── Dockerfile                    # Imagem PHP 8.1 FPM Alpine otimizada
└── index.php                     # Front controller da aplicação
```

---

## 📝 Melhorias Futuras

- [ ] Implementação de autenticação via JWT (JSON Web Tokens) assinados com chave privada
- [ ] Documentação automatizada no padrão OpenAPI 3.0 / Swagger UI
- [ ] Validação de schema JSON através de biblioteca dedicada

---

## 📄 Finalização

<div align="center">

Feito com ❤️ por Gabriel Martins 🚀

</div>
