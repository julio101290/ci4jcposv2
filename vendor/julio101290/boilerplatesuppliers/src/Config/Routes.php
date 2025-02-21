<?php

$routes->group('admin', function ($routes) {






    
    $routes->resource('proveedores', [
        'filter' => 'permission:proveedores-permission',
        'controller' => 'ProveedoresController',
        'except' => 'show',
        'namespace' => 'julio101290\boilerplatesuppliers\Controllers',
    ]);

    $routes->post('proveedores/save'
                , 'ProveedoresController::save'
                ,['namespace' => 'julio101290\boilerplatesuppliers\Controllers']
                );

    $routes->post('proveedores/getProveedores'
                    , 'ProveedoresController::getProveedores'
                    ,['namespace' => 'julio101290\boilerplatesuppliers\Controllers']
                    );

    $routes->post('proveedores/getProveedoresAjax'
                , 'ProveedoresController::getProveedoresAjax'
                ,['namespace' => 'julio101290\boilerplatesuppliers\Controllers']
                );

});
