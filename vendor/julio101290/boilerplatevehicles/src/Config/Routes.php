<?php

$routes->group('admin', function ($routes) {


    $routes->resource('tipovehiculo', [
        'filter' => 'permission:tipovehiculo-permission',
        'controller' => 'tipovehiculoController',
        'except' => 'show',
        'namespace' => 'julio101290\boilerplatevehicles\Controllers',
    ]);

    $routes->post('tipovehiculo/save'
                , 'TipovehiculoController::save'
                ,['namespace' => 'julio101290\boilerplatevehicles\Controllers']
                );
    $routes->post('tipovehiculo/getTipovehiculo'
                , 'TipovehiculoController::getTipovehiculo'
                , ['namespace' => 'julio101290\boilerplatevehicles\Controllers']
                );
    $routes->post('vehiculos/getTipoVehiculoAjax'
                , 'TipovehiculoController::getTipoVehiculosAjax'
                , ['namespace' => 'julio101290\boilerplatevehicles\Controllers']
                );

    $routes->resource('vehiculos', [
        'filter' => 'permission:vehiculos-permission',
        'controller' => 'vehiculosController',
        'except' => 'show',
        'namespace' => 'julio101290\boilerplatevehicles\Controllers',
    ]);


    $routes->post('vehiculos/save'
                , 'VehiculosController::save'
                , ['namespace' => 'julio101290\boilerplatevehicles\Controllers']
                );
    $routes->post('vehiculos/getVehiculos'
                , 'VehiculosController::getVehiculos'
                , ['namespace' => 'julio101290\boilerplatevehicles\Controllers']
                );
    $routes->post('vehiculos/getVehiculossAjax'
                , 'VehiculosController::getVehiculosAjax'
                , ['namespace' => 'julio101290\boilerplatevehicles\Controllers']
                );


});
