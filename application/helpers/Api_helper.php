<?php
defined('BASEPATH') or exit('No direct script access allowed');

function get_demo_users()
{
	return array(
		array(
			'id' => 'usr-01',
			'name' => 'Gabriel Martins',
			'email' => 'admin@escola.com',
			'password' => 'Password@123',
			'role' => 'Administrador Geral',
			'permissions' => 'Acesso total aos endpoints de consulta, cadastro, edição e exclusão de estudantes.',
		),
		array(
			'id' => 'usr-02',
			'name' => 'Prof. Carlos Eduardo',
			'email' => 'coordenador@escola.com',
			'password' => 'Password@123',
			'role' => 'Coordenador Pedagógico',
			'permissions' => 'Consulta de turmas, emissão de relatórios e lançamento de novos estudantes.',
		),
		array(
			'id' => 'usr-03',
			'name' => 'Ana Beatriz Lima',
			'email' => 'secretaria@escola.com',
			'password' => 'Password@123',
			'role' => 'Secretaria Acadêmica',
			'permissions' => 'Atualização cadastral, alteração de status e consulta de matrículas ativas.',
		),
	);
}

function authenticate_api_user($email, $password)
{
	$users = get_demo_users();
	foreach ($users as $user) {
		if (strtolower(trim($user['email'])) === strtolower(trim($email)) && $user['password'] === $password) {
			return $user;
		}
	}
	return null;
}

function get_estudantes()
{
	$CI = &get_instance();
	if (!$CI->db->table_exists('estudantes')) {
		return array();
	}
	return $CI->db->order_by('matricula', 'ASC')->get('estudantes')->result_array();
}

function get_estudante_by_matricula($matricula)
{
	$CI = &get_instance();
	if (!$CI->db->table_exists('estudantes')) {
		return null;
	}
	return $CI->db->where('matricula', $matricula)->get('estudantes')->row_array();
}

function post_estudante($data)
{
	$CI = &get_instance();
	return $CI->db->insert('estudantes', $data);
}

function put_estudante($matricula, $data)
{
	$CI = &get_instance();
	$CI->db->where('matricula', $matricula);
	return $CI->db->update('estudantes', $data);
}

function delete_estudante($matricula)
{
	$CI = &get_instance();
	$CI->db->where('matricula', $matricula);
	return $CI->db->delete('estudantes');
}
