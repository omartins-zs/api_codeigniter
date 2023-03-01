<?php

function get_estudantes()
{
	$CI =& get_instance();
	return $CI->db->get('estudantes')->result();
}

function post_estudante($data){
	$CI =& get_instance();
	$CI->db->insert('estudantes',$data);
}
