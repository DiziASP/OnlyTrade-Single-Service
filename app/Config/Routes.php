<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

/**
 * API Routes
 */
// Filter every route in admins except index and show
$routes->get('/api/admins', 'Admins::index');
$routes->get('/api/admins/(:any)', 'Admins::show/$1');
$routes->put('/api/admins/(:any)', 'Admins::update/$1');
$routes->resource('api/admins', ['filter' => 'jwt']);

// Filter every route in barang except index and show
$routes->get('/api/barang', 'Barang::index');
$routes->get('/api/barang/(:any)', 'Barang::show/$1');
$routes->put('/api/barang/(:any)', 'Barang::update/$1');
$routes->resource('/api/barang', ['filter' => 'jwt']);

// Filter every route in perusahaan except index and show
$routes->get('/api/perusahaan', 'Perusahaan::index');
$routes->get('/api/perusahaan/(:any)', 'Perusahaan::show/$1');
$routes->put('/api/perusahaan/(:any)', 'Perusahaan::update/$1');
$routes->resource('api/perusahaan', ['filter' => 'jwt']);

// Auth Routes
$routes->get('/login', 'Auth::index');
$routes->get('/register', 'Auth::register');
$routes->post('/api/auth/login', 'Auth::loginAction');
$routes->post('/api/auth/register', 'Auth::registerAction');
$routes->get('/api/auth/logout', 'Auth::logoutAction');

/**
 * View Routes
 */
$routes->get('/', 'Dashboard::index', ['filter' => 'route']);
$routes->get('/barang', 'Dashboard::barang_dashboard', ['filter' => 'route']);
$routes->get('/perusahaan', 'Dashboard::perusahaan_dashboard', ['filter' => 'route']);
