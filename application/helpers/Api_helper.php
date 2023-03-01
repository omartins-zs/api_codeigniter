<?php

function get_estudantes()
{
	$CI = &get_instance();
	return $CI->db->get('estudantes')->result();
}
