<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// API Call Routes
// Filter every route in admins except index and show
$routes->get('/admins', 'Admins::index');
$routes->get('/admins/(:num)', 'Admins::show/$1');

$routes->resource('admins', ['filter' => 'jwt']);

// Filter every route in admins except index and show
$routes->get('/barang', 'Barang::index');
$routes->get('/barang/(:num)', 'Barang::show/$1');
$routes->resource('barang', ['filter' => 'jwt']);

// Filter every route in admins except index and show
$routes->get('/perusahaan', 'Perusahaan::index');
$routes->get('/perusahaan/(:num)', 'Perusahaan::show/$1');
$routes->resource('perusahaan', ['filter' => 'jwt']);

// Auth Routes
$routes->get('/login', 'Auth::index');
$routes->get('/register', 'Auth::register');
$routes->post('/auth/login', 'Auth::loginAction');
$routes->post('/auth/register', 'Auth::registerAction');

// Page Routes
$routes->get('/', 'Home::index', ['filter' => 'jwt']);
