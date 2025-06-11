<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group('admin', function ($routes) {


    $routes->resource('sapservicelayer', [
        'filter' => 'permission:sapservicelayer-permission',
        'controller' => 'sapservicelayerController',
        'except' => 'show'
    ]);
    
    $routes->post('sapservicelayer/save', 'SapservicelayerController::save');
    
    $routes->get('error404', 'Home::error404');
    
});
