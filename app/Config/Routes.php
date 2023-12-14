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
$routes->post('api/admins', 'Admins::create', ['filter' => 'jwt']);
$routes->delete('/api/admins/(:any)', 'Admins::delete/$1', ['filter' => 'jwt']);

// Filter every route in barang except index and show
$routes->get('/api/barang', 'Barang::index');
$routes->get('/api/barang/(:any)', 'Barang::show/$1');
$routes->put('/api/barang/(:any)', 'Barang::update/$1');
$routes->post('api/barang', 'Barang::create', ['filter' => 'jwt']);
$routes->delete('/api/barang/(:any)', 'Barang::delete/$1', ['filter' => 'jwt']);

// Filter every route in perusahaan except index and show
$routes->get('/api/perusahaan', 'Perusahaan::index');
$routes->get('/api/perusahaan/(:any)', 'Perusahaan::show/$1');
$routes->put('/api/perusahaan/(:any)', 'Perusahaan::update/$1');
$routes->post('api/perusahaan', 'Perusahaan::create', ['filter' => 'jwt']);
$routes->delete('/api/perusahaan/(:any)', 'Perusahaan::delete/$1', ['filter' => 'jwt']);

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
$routes->group('barang', function ($routes) {
    $routes->get('/', 'Dashboard::barang_dashboard', ['filter' => 'route']);
    $routes->get('add', 'Dashboard::barang_add', ['filter' => 'route']);
    $routes->get('(:any)', 'Dashboard::barang_edit/$1', ['filter' => 'route']);
});
$routes->get('/perusahaan', 'Dashboard::perusahaan_dashboard', ['filter' => 'route']);
