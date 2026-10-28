# 🔐 Acessos e Dados de Teste

Utilize as credenciais e dados abaixo para testar os endpoints da API REST em ambiente local ou Docker. Todos os usuários e registros foram gerados automaticamente via *Seeders* (`docker/mysql/init.sql` e `application/helpers/Api_helper.php`).

## 1. Acesso ao Sistema (Usuários de Teste)

| Perfil | E-mail / Usuário | Senha | Permissão / Detalhes |
| --- | --- | --- | --- |
| Administrador Geral | `admin@escola.com` | `Password@123` | Acesso total aos endpoints de consulta, cadastro, edição e exclusão de estudantes. |
| Coordenador Pedagógico | `coordenador@escola.com` | `Password@123` | Consulta de turmas, emissão de relatórios e lançamento de novos estudantes. |
| Secretaria Acadêmica | `secretaria@escola.com` | `Password@123` | Atualização cadastral, alteração de status e consulta de matrículas ativas. |

## 2. URLs Principais

| Ambiente | Aplicação (Home / Console) | Login API |
| --- | --- | --- |
| **Docker** | `http://localhost:8080/` | `http://localhost:8080/api/login` |
| **Local** (`php -S 127.0.0.1:8000`) | `http://127.0.0.1:8000/` | `http://127.0.0.1:8000/api/login` |

## 3. Endpoints da API REST

| Método | Endpoint (Exemplo Docker) | Descrição |
| --- | --- | --- |
| `GET` | `http://localhost:8080/api/health` | Healthcheck da API e conexão com MySQL |
| `POST` | `http://localhost:8080/api/login` | Autenticação e emissão de token para os perfis demo |
| `GET` | `http://localhost:8080/api/demo_users` | Lista de usuários de demonstração |
| `GET` | `http://localhost:8080/api/get_estudantes` | Listagem completa de estudantes cadastrados |
| `GET` | `http://localhost:8080/api/get_estudante/2016-3214` | Consulta individual por número de matrícula |
| `POST` | `http://localhost:8080/api/post_estudante` | Cadastro de novo estudante (JSON ou POST) |
| `PUT` | `http://localhost:8080/api/put_estudante` | Atualização cadastral de estudante |
| `DELETE` | `http://localhost:8080/api/delete_estudante` | Exclusão segura de estudante |

## 4. Validação do Acesso

Validação da saúde da aplicação no ambiente de desenvolvimento:

| Verificação | Resultado Esperado |
| --- | --- |
| Containers (`ci_mysql`, `ci_app`, `ci_nginx`, `ci_phpmyadmin`) | Saudáveis / Rodando |
| Endpoint de Healthcheck (`/api/health`) | HTTP `200` (`"database": "connected"`) |
| Console interativo da API (`/`) | HTTP `200` |
| Login com perfil demo (`/api/login`) | HTTP `200` com token de sessão |

## 5. Carregar Dados de Teste

Caso o banco de dados seja apagado ou precise ser resetado, basta recriar os containers Docker ou executar o script SQL de inicialização:

**Com Docker:**
```bash
docker compose down -v
docker compose up -d --build
```

**Rodando Localmente (Sem Docker):**
Execute o script [`docker/mysql/init.sql`](../docker/mysql/init.sql) no seu banco de dados `apiclasse` através do HeidiSQL ou PHPMyAdmin.

---

### 📝 Observações:
- O banco de dados já é populado automaticamente com os registros iniciais dos alunos (Raquel Campos, Gabriel Antunes, Jorge Jorginho, Fernando Fer e Carlos Guimarães) e usuários administrativos.
- Use estas credenciais **apenas** em ambiente local ou Docker de desenvolvimento.
