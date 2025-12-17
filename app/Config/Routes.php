<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

/**
 * 
 */
$routes->get('/', 'Home::index');
$routes->get('/about', 'Home::about');
$routes->get('/contact', 'Home::contact');
/**
 * 
 */
$routes->get('/register', 'Auth::new');
$routes->get('/login', 'Auth::index');
$routes->post('/login/auth', 'Auth::auth');

$routes->get('/logout', 'Auth::logout');
$routes->get('/dashboard', 'Auth::dashboard');
$routes->post('/register', 'Auth::create');
$routes->get('/register/success', 'Auth::success');

// Admin routes
$routes->get('/admin/users', 'Admin::users');
$routes->post('/admin/users/create', 'Admin::createUser');
$routes->get('/admin/users/delete/(:num)', 'Admin::deleteUser/$1');
$routes->get('/admin/courses', 'Admin::courses');
$routes->get('/admin/reports', 'Admin::reports');
$routes->get('/admin/settings', 'Admin::settings');

// Teacher routes
$routes->get('/teacher/courses', 'Teacher::courses');
$routes->get('/teacher/students', 'Teacher::students');
$routes->get('/teacher/gradebook', 'Teacher::gradebook');
$routes->get('/teacher/assignments', 'Teacher::assignments');

// Student routes
$routes->get('/student/courses', 'Student::courses');
$routes->get('/student/grades', 'Student::grades');
$routes->get('/student/schedule', 'Student::schedule');
$routes->get('/student/assignments', 'Student::assignments');

// Common routes
$routes->get('/about', 'Pages::about');
$routes->get('/contact', 'Pages::contact');

$routes->setAutoRoute(true);