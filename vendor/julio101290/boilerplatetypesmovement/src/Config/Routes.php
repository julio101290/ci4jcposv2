<?php

$routes->group('admin', function ($routes) {


    $routes->post('tiposMovimientoInventario/getTiposMovimientoInventarioAjax'
                    , 'Tipos_movimientos_inventarioController::getTiposMovimientoAjax'
                    ,['namespace' => 'julio101290\boilerplatetypesmovement\Controllers']
                    );

    $routes->resource('tipos_movimientos_inventario', [
        'filter' => 'permission:tipos_movimientos_inventario-permission',
        'controller' => 'tipos_movimientos_inventarioController',
        'except' => 'show',
        'namespace' => 'julio101290\boilerplatetypesmovement\Controllers',
    ]);

    $routes->post('tipos_movimientos_inventario/save'
                , 'Tipos_movimientos_inventarioController::save'
                ,['namespace' => 'julio101290\boilerplatetypesmovement\Controllers']
                );
    $routes->post('tipos_movimientos_inventario/getTipos_movimientos_inventario'
                , 'Tipos_movimientos_inventarioController::getTipos_movimientos_inventario'
                ,['namespace' => 'julio101290\boilerplatetypesmovement\Controllers']
                );


});
