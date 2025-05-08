<?php

$routes->group('admin', function ($routes) {


    $routes->resource('arqueoCaja', [
        'filter' => 'permission:arqueoCaja-permission',
        'controller' => 'arqueoCajaController',
        'except' => 'show',
        'namespace' => 'julio101290\boilerplatecashtonnage\Controllers',
    ]);

    $routes->post('arqueoCaja/save'
                , 'ArqueoCajaController::save'
                ,['namespace' => 'julio101290\boilerplatecashtonnage\Controllers']
                );
    $routes->post('arqueoCaja/getArqueoCaja'
                , 'ArqueoCajaController::getArqueoCaja'
                ,['namespace' => 'julio101290\boilerplatecashtonnage\Controllers']
                );

    $routes->get('ArqueoCaja/report/(:num)'
                , 'ArqueoCajaController::report/$1'
                ,['namespace' => 'julio101290\boilerplatecashtonnage\Controllers']
                );


});
