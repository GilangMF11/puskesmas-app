<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
//$routes->get('/register', 'Home::index');
$routes->get('/login', 'Auth\AuthController::index');


// Dashboard
$routes->get('/dashboard', 'Dashboard\DashboardController::index');