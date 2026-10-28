<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// CORS headers
		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
		header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');

		if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
			exit;
		}

		$this->output->set_content_type('application/json', 'utf-8');
	}

	public function index()
	{
		$this->output
			->set_status_header(200)
			->set_output(json_encode(array(
				'status' => 200,
				'name' => 'API REST CodeIgniter 3',
				'version' => '1.0.0',
				'description' => 'API REST para gestão de estudantes e controle acadêmico.',
				'endpoints' => array(
					'GET /api/health' => 'Healthcheck da API e conexão com banco de dados',
					'POST /api/login' => 'Autenticação e geração de token de sessão demo',
					'GET /api/demo_users' => 'Lista de credenciais de teste para demonstração',
					'GET /api/get_estudantes' => 'Retorna a lista completa de estudantes',
					'GET /api/get_estudante/{matricula}' => 'Consulta um estudante específico por matrícula',
					'POST /api/post_estudante' => 'Cadastra um novo estudante no banco',
					'PUT /api/put_estudante' => 'Atualiza dados de um estudante existente',
					'DELETE /api/delete_estudante' => 'Remove um estudante da base',
				),
			), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
	}

	public function health()
	{
		$db_connected = FALSE;
		$db_error = NULL;

		try {
			if ($this->db->initialize()) {
				$db_connected = TRUE;
			}
		} catch (Exception $e) {
			$db_error = $e->getMessage();
		}

		$this->output
			->set_status_header(200)
			->set_output(json_encode(array(
				'status' => 200,
				'service' => 'api_codeigniter',
				'environment' => ENVIRONMENT,
				'database' => $db_connected ? 'connected' : 'disconnected',
				'database_error' => $db_error,
				'timestamp' => date('c'),
			), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
	}

	public function demo_users()
	{
		$this->output
			->set_status_header(200)
			->set_output(json_encode(array(
				'status' => 200,
				'data' => get_demo_users(),
			), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
	}

	public function login()
	{
		$input = $this->get_request_data();
		$email = isset($input['email']) ? trim($input['email']) : '';
		$password = isset($input['password']) ? trim($input['password']) : '';

		if (empty($email) || empty($password)) {
			$this->output
				->set_status_header(400)
				->set_output(json_encode(array(
					'status' => 400,
					'message' => 'Informe o e-mail e a senha para autenticar.',
				), JSON_UNESCAPED_UNICODE));
			return;
		}

		$user = authenticate_api_user($email, $password);
		if (!$user) {
			$this->output
				->set_status_header(401)
				->set_output(json_encode(array(
					'status' => 401,
					'message' => 'Credenciais inválidas. Verifique os dados ou utilize um perfil demo.',
				), JSON_UNESCAPED_UNICODE));
			return;
		}

		$token = base64_encode(json_encode(array(
			'user_id' => $user['id'],
			'email' => $user['email'],
			'role' => $user['role'],
			'time' => time(),
		)));

		$this->output
			->set_status_header(200)
			->set_output(json_encode(array(
				'status' => 200,
				'message' => 'Autenticação realizada com sucesso!',
				'token' => $token,
				'user' => $user,
			), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
	}

	public function get_estudantes()
	{
		$estudantes = get_estudantes();

		$this->output
			->set_status_header(200)
			->set_output(json_encode(array(
				'status' => 200,
				'total' => count($estudantes),
				'data' => $estudantes,
				'comentarios' => 'Lista de estudantes carregada com sucesso!',
			), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
	}

	public function get_estudante($matricula = NULL)
	{
		if (empty($matricula)) {
			$matricula = $this->input->get('matricula');
		}

		if (empty($matricula)) {
			$this->output
				->set_status_header(400)
				->set_output(json_encode(array(
					'status' => 400,
					'message' => 'Matrícula não informada.',
				), JSON_UNESCAPED_UNICODE));
			return;
		}

		$estudante = get_estudante_by_matricula($matricula);
		if (!$estudante) {
			$this->output
				->set_status_header(404)
				->set_output(json_encode(array(
					'status' => 404,
					'message' => "Estudante com matrícula {$matricula} não encontrado.",
				), JSON_UNESCAPED_UNICODE));
			return;
		}

		$this->output
			->set_status_header(200)
			->set_output(json_encode(array(
				'status' => 200,
				'data' => $estudante,
			), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
	}

	public function post_estudante()
	{
		$data = $this->get_request_data();

		if (empty($data['matricula']) || empty($data['nome'])) {
			$this->output
				->set_status_header(400)
				->set_output(json_encode(array(
					'status' => 400,
					'message' => 'Campos obrigatórios: matrícula e nome.',
				), JSON_UNESCAPED_UNICODE));
			return;
		}

		$payload = array(
			'matricula' => trim($data['matricula']),
			'nome' => trim($data['nome']),
			'apelido' => isset($data['apelido']) ? trim($data['apelido']) : '',
			'sexo' => isset($data['sexo']) ? strtoupper(trim($data['sexo'])) : 'M',
			'status' => isset($data['status']) ? trim($data['status']) : 'ativo',
		);

		if (get_estudante_by_matricula($payload['matricula'])) {
			$this->output
				->set_status_header(409)
				->set_output(json_encode(array(
					'status' => 409,
					'message' => "Já existe um estudante cadastrado com a matrícula {$payload['matricula']}.",
				), JSON_UNESCAPED_UNICODE));
			return;
		}

		post_estudante($payload);

		$this->output
			->set_status_header(201)
			->set_output(json_encode(array(
				'status' => 201,
				'message' => 'Estudante cadastrado com sucesso!',
				'data' => $payload,
			), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
	}

	public function put_estudante($matricula = NULL)
	{
		$data = $this->get_request_data();

		if (empty($matricula)) {
			$matricula = isset($data['matricula']) ? $data['matricula'] : $this->input->get('matricula');
		}

		if (empty($matricula)) {
			$this->output
				->set_status_header(400)
				->set_output(json_encode(array(
					'status' => 400,
					'message' => 'Matrícula não informada para atualização.',
				), JSON_UNESCAPED_UNICODE));
			return;
		}

		if (!get_estudante_by_matricula($matricula)) {
			$this->output
				->set_status_header(404)
				->set_output(json_encode(array(
					'status' => 404,
					'message' => "Estudante com matrícula {$matricula} não encontrado.",
				), JSON_UNESCAPED_UNICODE));
			return;
		}

		$update_data = array();
		if (isset($data['nome'])) $update_data['nome'] = trim($data['nome']);
		if (isset($data['apelido'])) $update_data['apelido'] = trim($data['apelido']);
		if (isset($data['sexo'])) $update_data['sexo'] = strtoupper(trim($data['sexo']));
		if (isset($data['status'])) $update_data['status'] = trim($data['status']);

		if (empty($update_data)) {
			$this->output
				->set_status_header(400)
				->set_output(json_encode(array(
					'status' => 400,
					'message' => 'Nenhum dado informado para atualização.',
				), JSON_UNESCAPED_UNICODE));
			return;
		}

		put_estudante($matricula, $update_data);

		$this->output
			->set_status_header(200)
			->set_output(json_encode(array(
				'status' => 200,
				'message' => 'Estudante atualizado com sucesso!',
				'data' => array_merge(array('matricula' => $matricula), $update_data),
			), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
	}

	public function delete_estudante($matricula = NULL)
	{
		$data = $this->get_request_data();

		if (empty($matricula)) {
			$matricula = isset($data['matricula']) ? $data['matricula'] : $this->input->get('matricula');
		}

		if (empty($matricula)) {
			$this->output
				->set_status_header(400)
				->set_output(json_encode(array(
					'status' => 400,
					'message' => 'Matrícula não informada para exclusão.',
				), JSON_UNESCAPED_UNICODE));
			return;
		}

		if (!get_estudante_by_matricula($matricula)) {
			$this->output
				->set_status_header(404)
				->set_output(json_encode(array(
					'status' => 404,
					'message' => "Estudante com matrícula {$matricula} não encontrado.",
				), JSON_UNESCAPED_UNICODE));
			return;
		}

		delete_estudante($matricula);

		$this->output
			->set_status_header(200)
			->set_output(json_encode(array(
				'status' => 200,
				'message' => "Estudante com matrícula {$matricula} excluído com sucesso!",
			), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
	}

	private function get_request_data()
	{
		$raw_json = file_get_contents('php://input');
		$data = json_decode($raw_json, true);

		if (is_array($data)) {
			return $data;
		}

		if (!empty($_POST)) {
			return $_POST;
		}

		return $_GET;
	}
}
