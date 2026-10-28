# Como Executar com Docker — API REST CodeIgniter 3

Guia para executar o sistema utilizando Docker Desktop.

---

## Stack e containers

| Container | Função | Porta |
| --- | --- | --- |
| `ci_nginx` | Servidor web Nginx e proxy reverso FastCGI | `8080` |
| `ci_app` | CodeIgniter 3 com PHP 8.1 FPM | Interna (`9000`) |
| `ci_mysql` | Banco de dados MySQL 8.0 com seed automático | `3308` |
| `ci_phpmyadmin` | Administração web do banco de dados | `8085` |

---

## 1) Preparar ambiente

```bash
cp .env.example .env
```

Deixe o bloco `DOCKER` ativo e o bloco `LOCAL` comentado:

```env
# LOCAL
# APP_URL=http://127.0.0.1:8000
#
# DB_CONNECTION=mysqli
# DB_HOST=127.0.0.1
# DB_PORT=3307
# DB_DATABASE=apiclasse
# DB_USERNAME=root
# DB_PASSWORD=

# DOCKER
APP_URL=http://localhost:8080

DB_CONNECTION=mysqli
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=apiclasse
DB_USERNAME=api_user
DB_PASSWORD=api_secret
```

> Dentro do Docker, utilizar `DB_HOST=mysql` e `DB_PORT=3306`. A porta `3308` é somente para acesso pelo computador host.

---

## 2) Subir containers

```bash
docker compose up -d --build
docker compose ps
```

---

## 3) Inicialização e seed automático

O container `ci_mysql` executa automaticamente o script [`docker/mysql/init.sql`](../docker/mysql/init.sql) no primeiro boot, criando o banco `apiclasse`, as tabelas `estudantes` e `usuarios`, e populando os dados iniciais.

---

## 4) Acessos

| Recurso | URL |
| --- | --- |
| Console Interativo & Docs | http://localhost:8080 |
| Healthcheck API | http://localhost:8080/api/health |
| Lista de Estudantes | http://localhost:8080/api/get_estudantes |
| Login API | http://localhost:8080/api/login |
| PHPMyAdmin | http://localhost:8085 |

### Credenciais de teste

```txt
Administrador Geral
URL de login: http://localhost:8080/api/login
E-mail: admin@escola.com
Senha: Password@123
```

```txt
Coordenador Pedagógico
URL de login: http://localhost:8080/api/login
E-mail: coordenador@escola.com
Senha: Password@123
```

```txt
Secretaria Acadêmica
URL de login: http://localhost:8080/api/login
E-mail: secretaria@escola.com
Senha: Password@123
```

### PHPMyAdmin

```txt
URL: http://localhost:8085
Servidor: mysql
Usuário: api_user
Senha: api_secret
```

---

## 5) Logs e diagnóstico

```bash
docker compose logs -f
docker compose logs -f app
docker compose logs -f nginx
curl http://localhost:8080/api/health
```

---

## 6) Parar ou reconstruir

```bash
docker compose down
docker compose up -d --build
```

Para apagar também os volumes persistentes do banco:

```bash
docker compose down -v
```

> O comando `docker compose down -v` pode apagar os dados do banco.
