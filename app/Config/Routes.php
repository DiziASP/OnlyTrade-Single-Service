<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// API Call Routes
$routes->resource('admins');
$routes->resource('barang');
$routes->resource('perusahaan');

// Auth Routes
$routes->get('/login', 'Auth::index');
$routes->post('/auth/login', 'Auth::loginAction');
$routes->post('/auth/register', 'Auth::registerAction');

// Page Routes
$routes->get('/', 'Home::index');
