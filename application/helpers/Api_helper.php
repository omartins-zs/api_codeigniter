<?php

function get_estudantes()
{
	$CI = &get_instance();
	return $CI->db->get('estudantes')->result();
}

function post_estudante($data)
{
	$CI = &get_instance();
	$CI->db->insert('estudantes', $data);
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
	$CI->db->query("DELETE FROM estudantes WHERE matricula ='{$matricula}'");
}
