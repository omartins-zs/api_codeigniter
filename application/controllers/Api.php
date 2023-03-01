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
			'data' => json_encode(get_estudantes()),
			'comentarios' => 'Olá tudo está bem!!!!!',
		);
		
		var_dump($data);
	}
}
