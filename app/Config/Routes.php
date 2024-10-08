<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/register', 'Auth\AuthController::register');
$routes->post('/register', 'Auth\AuthController::registerProses');
$routes->get('/login', 'Auth\AuthController::login');
$routes->post('/login', 'Auth\AuthController::loginProses');
// Logout
$routes->get('/logout', 'Auth\AuthController::logout');

// Grup rute yang membutuhkan filter auth
$routes->group('', ['filter' => 'auth'], function($routes) {
    $routes->get('/dashboard', 'Dashboard\DashboardController::index');
    
    $routes->group('dokter', function($routes) {
        $routes->get('/', 'Dokter\DokterController::index');
        $routes->post('save', 'Dokter\DokterController::store');
        $routes->get('delete/(:num)', 'Dokter\DokterController::destroy/$1');
    });
    
    $routes->group('ruangan', function($routes) {
        $routes->get('/', 'Ruangan\RuanganController::index');
        $routes->post('save', 'Ruangan\RuanganController::store');
        $routes->get('delete/(:num)', 'Ruangan\RuanganController::destroy/$1');
    });
});