# Como Executar — API REST CodeIgniter 3

Escolha **um** guia conforme seu ambiente:

| Guia | Quando usar | Requisitos no PC |
| --- | --- | --- |
| **[COMO_EXECUTAR_DOCKER.md](COMO_EXECUTAR_DOCKER.md)** | Executar em qualquer máquina com containers | Docker Desktop |
| **[COMO_EXECUTAR_LOCAL.md](COMO_EXECUTAR_LOCAL.md)** | Desenvolver com Laragon, XAMPP ou PHP CLI | PHP 7.4+, Composer e MySQL |
| **[ACESSOS_TESTES.md](ACESSOS_TESTES.md)** | Endpoints, credenciais e rotas de teste | Navegador ou Postman |

---

## Início rápido

### Local — Laragon ou XAMPP

Ative o bloco `LOCAL` no `.env` e execute:

```bash
cp .env.example .env
composer install
php -S 127.0.0.1:8000
```

Aplicação & Console Interativo:

http://127.0.0.1:8000

### Docker

Ative o bloco `DOCKER` no `.env` e execute:

```bash
cp .env.example .env
docker compose up -d --build
```

Aplicação & Console Interativo:

http://localhost:8080

---

## Logins demo

| Perfil | E-mail | Senha |
| --- | --- | --- |
| Administrador Geral | `admin@escola.com` | `Password@123` |
| Coordenador Pedagógico | `coordenador@escola.com` | `Password@123` |
| Secretaria Acadêmica | `secretaria@escola.com` | `Password@123` |

---

## URLs principais

| Área | Local | Docker |
| --- | --- | --- |
| Console Interativo & Docs | http://127.0.0.1:8000 | http://localhost:8080 |
| Healthcheck API | http://127.0.0.1:8000/api/health | http://localhost:8080/api/health |
| Lista de Estudantes | http://127.0.0.1:8000/api/get_estudantes | http://localhost:8080/api/get_estudantes |
| Login API | http://127.0.0.1:8000/api/login | http://localhost:8080/api/login |
| PHPMyAdmin | — | http://localhost:8085 |

---

## Outros documentos

- [COMO_EXECUTAR_LOCAL.md](COMO_EXECUTAR_LOCAL.md) — Guia detalhado para execução local
- [COMO_EXECUTAR_DOCKER.md](COMO_EXECUTAR_DOCKER.md) — Guia detalhado para execução com Docker
- [ACESSOS_TESTES.md](ACESSOS_TESTES.md) — Credenciais e fluxos de teste
