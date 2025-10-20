<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

$router->get('/', 'Tenants::index');

$router->get('/tenants', 'Tenants::index');
$router->get('/tenants/add', 'Tenants::add');
$router->post('/tenants/store', 'Tenants::store');
$router->get('/tenants/edit/(:num)', 'Tenants::edit/$1');
$router->post('/tenants/update/(:num)', 'Tenants::update/$1');
$router->get('/tenants/delete/(:num)', 'Tenants::delete/$1');
