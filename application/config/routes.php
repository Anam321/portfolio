<?php
defined('BASEPATH') or exit('No direct script access allowed');


$route['default_controller'] = 'Porfolio';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['sitemap\.xml'] = 'sitemap';

$route['login'] = 'administrasi/auth';
// $route['administrator'] = 'administrasi/dashboard';
$route['Profil'] = 'administrasi/profil';

$route['porfolio'] = 'porfolio/porfolio';
$route['porfolioid'] = 'porfolio/porfolio/detailfolio/';
