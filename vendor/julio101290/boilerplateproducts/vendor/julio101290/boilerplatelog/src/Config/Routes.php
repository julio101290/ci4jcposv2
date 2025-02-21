<?php


$routes->group('admin', function ($routes) {


    $routes->resource('log', [
        'filter' => 'permission:log-permission',
        'controller' => 'logController',
        'namespace' => 'julio101290\boilerplatelog\Controllers',
        'except' => 'show'
    ]);
    $routes->post('log/save'
    , 'LogController::save'
    , ['namespace' => 'julio101290\boilerplatelog\Controllers']);

    $routes->post('log/getLog'
    , 'LogController::getLog'
    , ['namespace' => 'julio101290\boilerplatelog\Controllers']
    );

});
