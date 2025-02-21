<?php

$routes->group('admin', function ($routes) {


    $routes->resource('storages', [
        'filter' => 'permission:storages-permission',
        'controller' => 'storagesController',
        'except' => 'show',
        'namespace' => 'julio101290\boilerplatestorages\Controllers',
    ]);

    $routes->post('storages/save'
                , 'StoragesController::save'
                ,['namespace' => 'julio101290\boilerplatestorages\Controllers']
                );

    $routes->post('storages/getStorages'
                , 'StoragesController::getStorages'
                ,['namespace' => 'julio101290\boilerplatestorages\Controllers']
                );

    $routes->post('storages/getStoragesAjax'
                , 'StoragesController::getStoragesAjax'
                ,['namespace' => 'julio101290\boilerplatestorages\Controllers']
                );


    $routes->post('usuariosAlmacen/getUsuariosAlmacen'
                , 'UsuariosAlmacenController::getUsuariosAlmacen'
                ,['namespace' => 'julio101290\boilerplatestorages\Controllers']
                );

    $routes->get('almacen/usuariosPorAlmacen/(:any)'
                , 'StoragesController::usuariosPorAlmacen/$1'
                 ,['namespace' => 'julio101290\boilerplatestorages\Controllers']
                );
    
    $routes->post('almacen/activarDesactivar'
                , 'StoragesController::activarDesactivar'
                ,['namespace' => 'julio101290\boilerplatestorages\Controllers']
                );


});
