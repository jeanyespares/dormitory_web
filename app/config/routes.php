<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

$router->get('/', 'Tenants::index');
$router->get('auth/login', 'AuthController@login');
$router->post('auth/login', 'AuthController@login');
$router->get('auth/register', 'AuthController@register');
$router->post('auth/register', 'AuthController@register');
$router->get('auth/logout', 'AuthController@logout');

