<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'auth::dashboard');
$routes->get('/login', 'auth::login');
$routes->post('/login', 'auth::login');
$routes->get('/register', 'auth::register');
$routes->post('/register', 'auth::register');
$routes->get('/dashboard', 'auth::dashboard');
$routes->get('/logout', 'auth::logout');
$routes->get('/restricted', 'Home::restricted');

$routes->get('/users', 'UserController::index');

// Edit user (loads the same page with the edit form)
$routes->get('/users/edit/(:num)', 'UserController::edit/$1');

// Update user (POST)
$routes->post('/users/update', 'UserController::update');

$routes->post('/users/create', 'UserController::create');


