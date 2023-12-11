<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');




$routes->get('/logout', 'LoginController::logout');
$routes->get('/login', 'LoginController::index');
$routes->post('/login_action', 'LoginController::login_action');
$routes->get('register', 'RegisterController::index');
$routes->post('register_action', 'RegisterController::register_action');