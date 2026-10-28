<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>API REST CodeIgniter 3 — Painel e Documentação</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;600&display=swap" rel="stylesheet">
	<style>
		:root {
			--bg: #0f172a;
			--card-bg: #1e293b;
			--card-border: #334155;
			--text-main: #f8fafc;
			--text-muted: #94a3b8;
			--primary: #3b82f6;
			--primary-hover: #2563eb;
			--success: #10b981;
			--warning: #f59e0b;
			--danger: #ef4444;
		}
		* { box-sizing: border-box; margin: 0; padding: 0; }
		body {
			font-family: 'Inter', sans-serif;
			background-color: var(--bg);
			color: var(--text-main);
			line-height: 1.6;
			padding: 2rem 1rem;
		}
		.container {
			max-width: 1200px;
			margin: 0 auto;
		}
		header {
			display: flex;
			flex-wrap: wrap;
			justify-content: space-between;
			align-items: center;
			gap: 1rem;
			padding-bottom: 2rem;
			border-bottom: 1px solid var(--card-border);
			margin-bottom: 2rem;
		}
		.logo-title h1 {
			font-size: 1.75rem;
			font-weight: 800;
			display: flex;
			align-items: center;
			gap: 0.5rem;
		}
		.badge {
			display: inline-block;
			font-size: 0.75rem;
			font-weight: 700;
			padding: 0.2rem 0.6rem;
			border-radius: 9999px;
			text-transform: uppercase;
		}
		.badge-success { background: rgba(16, 185, 129, 0.2); color: #34d399; border: 1px solid rgba(16, 185, 129, 0.4); }
		.badge-method-get { background: rgba(59, 130, 246, 0.2); color: #60a5fa; border: 1px solid rgba(59, 130, 246, 0.4); }
		.badge-method-post { background: rgba(16, 185, 129, 0.2); color: #34d399; border: 1px solid rgba(16, 185, 129, 0.4); }
		.badge-method-put { background: rgba(245, 158, 11, 0.2); color: #fbbf24; border: 1px solid rgba(245, 158, 11, 0.4); }
		.badge-method-delete { background: rgba(239, 68, 68, 0.2); color: #f87171; border: 1px solid rgba(239, 68, 68, 0.4); }

		.grid {
			display: grid;
			grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
			gap: 1.5rem;
			margin-bottom: 2rem;
		}
		.card {
			background: var(--card-bg);
			border: 1px solid var(--card-border);
			border-radius: 0.75rem;
			padding: 1.5rem;
		}
		.card h2 {
			font-size: 1.15rem;
			font-weight: 700;
			margin-bottom: 0.75rem;
			display: flex;
			align-items: center;
			justify-content: space-between;
		}
		.demo-user-btn {
			width: 100%;
			text-align: left;
			background: rgba(15, 23, 42, 0.6);
			border: 1px solid var(--card-border);
			padding: 0.75rem 1rem;
			border-radius: 0.5rem;
			color: var(--text-main);
			margin-bottom: 0.5rem;
			cursor: pointer;
			transition: all 0.2s;
		}
		.demo-user-btn:hover {
			border-color: var(--primary);
			background: rgba(59, 130, 246, 0.1);
		}
		.demo-user-role { font-weight: 700; font-size: 0.85rem; color: #60a5fa; }
		.demo-user-email { font-size: 0.8rem; color: var(--text-muted); font-family: 'JetBrains Mono', monospace; }

		.endpoint-item {
			background: rgba(15, 23, 42, 0.6);
			border: 1px solid var(--card-border);
			border-radius: 0.5rem;
			padding: 1rem;
			margin-bottom: 1rem;
		}
		.endpoint-header {
			display: flex;
			align-items: center;
			justify-content: space-between;
			margin-bottom: 0.5rem;
		}
		.endpoint-path {
			font-family: 'JetBrains Mono', monospace;
			font-size: 0.85rem;
			color: #e2e8f0;
		}
		.btn-run {
			background: var(--primary);
			color: white;
			border: none;
			padding: 0.4rem 0.8rem;
			border-radius: 0.375rem;
			font-size: 0.8rem;
			font-weight: 600;
			cursor: pointer;
			transition: background 0.2s;
		}
		.btn-run:hover { background: var(--primary-hover); }

		pre {
			background: #090d16;
			border: 1px solid var(--card-border);
			border-radius: 0.5rem;
			padding: 1rem;
			color: #38bdf8;
			font-family: 'JetBrains Mono', monospace;
			font-size: 0.85rem;
			overflow-x: auto;
			max-height: 400px;
		}
		footer {
			text-align: center;
			margin-top: 3rem;
			color: var(--text-muted);
			font-size: 0.85rem;
			border-top: 1px solid var(--card-border);
			padding-top: 1.5rem;
		}
	</style>
</head>
<body>
	<div class="container">
		<header>
			<div class="logo-title">
				<h1>⚡ API REST CodeIgniter 3</h1>
				<p style="color: var(--text-muted); font-size: 0.9rem;">Gestão Acadêmica e Cadastro de Estudantes</p>
			</div>
			<div>
				<span class="badge badge-success">● API Online</span>
				<span class="badge" style="background: rgba(148, 163, 184, 0.2); color: #cbd5e1;">PHP 8.1 / CodeIgniter 3.1.13</span>
			</div>
		</header>

		<div class="grid">
			<!-- Coluna 1: Perfis de Teste Demo -->
			<div class="card">
				<h2>🔐 Credenciais de Demonstração</h2>
				<p style="color: var(--text-muted); font-size: 0.85rem; margin-bottom: 1rem;">
					Clique para autenticar no endpoint <code>/api/login</code> em 1 clique:
				</p>

				<button class="demo-user-btn" onclick="loginDemo('admin@escola.com', 'Password@123')">
					<div class="demo-user-role">Administrador Geral</div>
					<div class="demo-user-email">admin@escola.com • Password@123</div>
				</button>

				<button class="demo-user-btn" onclick="loginDemo('coordenador@escola.com', 'Password@123')">
					<div class="demo-user-role">Coordenador Pedagógico</div>
					<div class="demo-user-email">coordenador@escola.com • Password@123</div>
				</button>

				<button class="demo-user-btn" onclick="loginDemo('secretaria@escola.com', 'Password@123')">
					<div class="demo-user-role">Secretaria Acadêmica</div>
					<div class="demo-user-email">secretaria@escola.com • Password@123</div>
				</button>

				<div id="session-status" style="margin-top: 1rem; font-size: 0.8rem; color: var(--text-muted);">
					Status: Nenhuma sessão ativa. Clique em um perfil acima.
				</div>
			</div>

			<!-- Coluna 2: Console de Resposta em Tempo Real -->
			<div class="card" style="grid-column: span 1 / -1;">
				<h2>📡 Resposta do Endpoint <span id="response-time" style="font-size: 0.8rem; color: var(--text-muted); font-weight: normal;"></span></h2>
				<pre id="json-output">// Execute um dos endpoints abaixo para inspecionar a resposta JSON da API...</pre>
			</div>
		</div>

		<!-- Lista de Endpoints Disponíveis -->
		<div class="card">
			<h2 style="margin-bottom: 1.5rem;">🚀 Endpoints da API REST</h2>

			<div class="endpoint-item">
				<div class="endpoint-header">
					<span class="badge badge-method-get">GET</span>
					<span class="endpoint-path">/api/health</span>
					<button class="btn-run" onclick="callApi('/api/health')">Executar</button>
				</div>
				<p style="color: var(--text-muted); font-size: 0.8rem;">Verifica o estado da API e a conectividade com o banco de dados MySQL.</p>
			</div>

			<div class="endpoint-item">
				<div class="endpoint-header">
					<span class="badge badge-method-get">GET</span>
					<span class="endpoint-path">/api/get_estudantes</span>
					<button class="btn-run" onclick="callApi('/api/get_estudantes')">Executar</button>
				</div>
				<p style="color: var(--text-muted); font-size: 0.8rem;">Lista todos os estudantes matriculados cadastrados na base de dados.</p>
			</div>

			<div class="endpoint-item">
				<div class="endpoint-header">
					<span class="badge badge-method-get">GET</span>
					<span class="endpoint-path">/api/get_estudante/2016-3214</span>
					<button class="btn-run" onclick="callApi('/api/get_estudante/2016-3214')">Executar</button>
				</div>
				<p style="color: var(--text-muted); font-size: 0.8rem;">Consulta os detalhes de um estudante específico através do número de matrícula.</p>
			</div>

			<div class="endpoint-item">
				<div class="endpoint-header">
					<span class="badge badge-method-post">POST</span>
					<span class="endpoint-path">/api/post_estudante</span>
					<button class="btn-run" onclick="createSampleStudent()">Cadastrar Exemplo</button>
				</div>
				<p style="color: var(--text-muted); font-size: 0.8rem;">Insere um novo estudante na base (envia matrícula, nome, apelido, sexo e status via JSON).</p>
			</div>

			<div class="endpoint-item">
				<div class="endpoint-header">
					<span class="badge badge-method-get">GET</span>
					<span class="endpoint-path">/api/demo_users</span>
					<button class="btn-run" onclick="callApi('/api/demo_users')">Executar</button>
				</div>
				<p style="color: var(--text-muted); font-size: 0.8rem;">Retorna a lista de perfis de teste e seus níveis de permissão.</p>
			</div>
		</div>

		<footer>
			<p>API REST desenvolvida em CodeIgniter 3 com arquitetura limpa e conteinerizada.</p>
			<p style="margin-top: 0.25rem;">Feito com ❤️ por Gabriel Martins 🚀</p>
		</footer>
	</div>

	<script>
		const baseUrl = window.location.origin + window.location.pathname.replace(/\/index\.php\/?$/, '').replace(/\/$/, '');

		async function callApi(path, options = {}) {
			const output = document.getElementById('json-output');
			const timeLabel = document.getElementById('response-time');
			output.innerText = '// Enviando requisição para ' + path + '...';

			const start = performance.now();
			try {
				const response = await fetch(baseUrl + path, options);
				const data = await response.json();
				const duration = Math.round(performance.now() - start);

				timeLabel.innerText = 'Status: ' + response.status + ' ' + response.statusText + ' (' + duration + 'ms)';
				output.innerText = JSON.stringify(data, null, 2);
			} catch (err) {
				timeLabel.innerText = 'Erro na requisição';
				output.innerText = '// Erro de rede ou parse: ' + err.message;
			}
		}

		async function loginDemo(email, password) {
			const statusDiv = document.getElementById('session-status');
			statusDiv.innerText = 'Autenticando ' + email + '...';

			await callApi('/api/login', {
				method: 'POST',
				headers: { 'Content-Type': 'application/json' },
				body: JSON.stringify({ email: email, password: password })
			});

			statusDiv.innerHTML = '<strong style="color: #34d399;">✓ Sessão ativa:</strong> ' + email;
		}

		function createSampleStudent() {
			const randomSuffix = Math.floor(1000 + Math.random() * 9000);
			const payload = {
				matricula: '2026-' + randomSuffix,
				nome: 'Estudante Teste ' + randomSuffix,
				apelido: 'Teste' + randomSuffix,
				sexo: 'M',
				status: 'ativo'
			};

			callApi('/api/post_estudante', {
				method: 'POST',
				headers: { 'Content-Type': 'application/json' },
				body: JSON.stringify(payload)
			});
		}

		// Carrega status de health ao iniciar
		window.onload = function() {
			callApi('/api/health');
		};
	</script>
</body>
</html>
