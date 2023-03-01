<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function get_estudantes()
	{
		// Json_encode -> Converte Objeto PHP para string JSON
		$data = array(
			'status' => 200,
			'data' => get_estudantes(),
			'comentarios' => 'Olá tudo está bem!!!!!',
		);

		echo json_encode($data);
	}

	public function post_estudante()
	{
		if (isset($_GET['matricula'])) {
			$data = array(
				'matricula' => $_GET['matricula'],
				'nome' => $_GET['nome'],
				'apelido' => $_GET['apelido'],
				'sexo' => $_GET['sexo'],
			);
			post_estudante($data);
		}
	}
	public function put_estudante()
	{
		if (isset($_GET['matricula']))
			$matricula = $_GET['matricula']; {
			$data = array(
				'matricula' => $_GET['matricula'],
				'nome' => $_GET['nome'],
				'apelido' => $_GET['apelido'],
				'sexo' => $_GET['sexo'],
			);
			put_estudante($matricula, $data);
		}
	}

	public function delete_estudante()
	{
		if (isset($_GET['matricula'])) {

			$matricula = $_GET['matricula'];
			delete_estudante($matricula);
		}
	}
}
