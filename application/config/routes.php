<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING - CodeIgniter 3
| -------------------------------------------------------------------------
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Rotas amigáveis da API REST
$route['api/health'] = 'api/health';
$route['api/login'] = 'api/login';
$route['api/demo_users'] = 'api/demo_users';
$route['api/get_estudantes'] = 'api/get_estudantes';
$route['api/estudantes'] = 'api/get_estudantes';
$route['api/get_estudante/(:any)'] = 'api/get_estudante/$1';
$route['api/estudantes/(:any)'] = 'api/get_estudante/$1';
$route['api/post_estudante'] = 'api/post_estudante';
$route['api/put_estudante'] = 'api/put_estudante';
$route['api/put_estudante/(:any)'] = 'api/put_estudante/$1';
$route['api/delete_estudante'] = 'api/delete_estudante';
$route['api/delete_estudante/(:any)'] = 'api/delete_estudante/$1';
