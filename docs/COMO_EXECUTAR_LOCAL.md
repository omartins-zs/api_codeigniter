# Como Executar Localmente — API REST CodeIgniter 3

Guia para rodar **sem Docker**, no **Laragon**, **XAMPP** ou com o servidor embutido do PHP (`php -S`).

> **Não quer instalar PHP ou MySQL?** Use [COMO_EXECUTAR_DOCKER.md](COMO_EXECUTAR_DOCKER.md) — basta Docker Desktop, em qualquer Windows, Mac ou Linux.

---

## Requisitos

Para rodar localmente, o essencial é **PHP** compatível e **MySQL**:

| Ferramenta | Obrigatório? | Versão mínima |
| --- | --- | --- |
| **PHP** | Sim | 7.4+ ou 8.1+ |
| **Composer** | Sim | 2.x |
| **MySQL** | Sim | 5.7+ ou 8.0+ |

Extensões PHP necessárias: `mysqli`, `pdo_mysql`, `mbstring`, `intl`, `curl`, `json`.

### Ambiente de referência (máquina de desenvolvimento)

Stack usada na elaboração deste projeto — **não é requisito fixo**, só referência do que já foi testado:

| Ferramenta | Versão |
| --- | --- |
| **Laragon** | **6.0.0** |
| PHP (via Laragon) | 8.4.6 |
| Composer | 2.8.12 |
| Laravel (no projeto) | 13.15.0 |
| **Node.js** | **22.14.0+** |
| **NPM** | **11.4.2+** |

Para conferir no seu computador:

```bash
php -v
composer --version
```

---

## 1) Preparar ambiente

### 1.1 Clonar ou acessar o projeto

```bash
cd c:/Projetos/api_codeigniter
```

### 1.2 Copiar variáveis de ambiente

```bash
cp .env.example .env
```

No PowerShell:

```powershell
Copy-Item .env.example .env
```

### 1.3 Ativar o ambiente local

Deixe o bloco `LOCAL` ativo e o bloco `DOCKER` comentado no `.env`:

```env
# LOCAL
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysqli
DB_HOST=127.0.0.1
DB_PORT=3307
DB_DATABASE=apiclasse
DB_USERNAME=root
DB_PASSWORD=

# DOCKER
# APP_URL=http://localhost:8080
#
# DB_CONNECTION=mysqli
# DB_HOST=mysql
# DB_PORT=3306
# DB_DATABASE=apiclasse
# DB_USERNAME=api_user
# DB_PASSWORD=api_secret
```

### 1.4 Criar e popular o banco de dados

Crie o banco pelo HeidiSQL ou PHPMyAdmin executando o script [`docker/mysql/init.sql`](../docker/mysql/init.sql):

```sql
CREATE DATABASE apiclasse CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

> No ambiente local com Laragon, utilizar MySQL na porta **3307**, usuário `root` e senha vazia.

---

## 2) Instalar dependências

```bash
composer install
```

---

## 3) Rodar aplicação

Inicie o servidor embutido do PHP:

```bash
php -S 127.0.0.1:8000
```

Aplicação:

http://127.0.0.1:8000

---

## 4) Acessos

| Recurso | URL |
| --- | --- |
| Painel & Console Interativo | http://127.0.0.1:8000 |
| Healthcheck API | http://127.0.0.1:8000/api/health |
| Lista de Estudantes | http://127.0.0.1:8000/api/get_estudantes |
| Login API | http://127.0.0.1:8000/api/login |

### Credenciais de teste

```txt
Administrador Geral
URL de login: http://127.0.0.1:8000/api/login
E-mail: admin@escola.com
Senha: Password@123
```

```txt
Coordenador Pedagógico
URL de login: http://127.0.0.1:8000/api/login
E-mail: coordenador@escola.com
Senha: Password@123
```

```txt
Secretaria Acadêmica
URL de login: http://127.0.0.1:8000/api/login
E-mail: secretaria@escola.com
Senha: Password@123
```

---

## 5) Comandos úteis

```bash
php -S 127.0.0.1:8000
curl http://127.0.0.1:8000/api/health
curl http://127.0.0.1:8000/api/get_estudantes
```

---

## 6) Problemas comuns

### Banco não conecta

Verifique se a porta configurada no `.env` coincide com o seu MySQL local (ex: porta `3306` ou `3307` do Laragon):

```env
DB_HOST=127.0.0.1
DB_PORT=3307
```

---

## Próximo passo

Para ambiente containerizado, consulte [COMO_EXECUTAR_DOCKER.md](COMO_EXECUTAR_DOCKER.md).
