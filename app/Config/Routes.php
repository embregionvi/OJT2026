<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index', ['filter' => 'session']);

$routes->group('administrator', ['filter' => 'group:superadmin'], static function ($routes) {
    $routes->get('dashboard', 'Administrator\Dashboard::index');
    
    // User Management
    $routes->group('users', static function ($routes) {
        $routes->get('/', 'Administrator\Users::index');
        $routes->get('create', 'Administrator\Users::create');
        $routes->post('store', 'Administrator\Users::store');
        $routes->get('edit/(:num)', 'Administrator\Users::edit/$1');
        $routes->post('update/(:num)', 'Administrator\Users::update/$1');
        $routes->get('delete/(:num)', 'Administrator\Users::delete/$1');
        $routes->get('toggle/(:num)', 'Administrator\Users::toggle/$1');
    });
});

service('auth')->routes($routes);
