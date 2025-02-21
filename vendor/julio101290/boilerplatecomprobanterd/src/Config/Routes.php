<?php

$routes->group('admin', function ($routes) {


    $routes->resource('comprobantes_rd', [
        'filter' => 'permission:comprobantes_rd-permission',
        'controller' => 'comprobantes_rdController',
        'except' => 'show',
        'namespace' => 'julio101290\boilerplatecomprobanterd\Controllers',
    ]);


    $routes->post('comprobantes_rd/save'
                , 'Comprobantes_rdController::save'
                ,['namespace' => 'julio101290\boilerplatecomprobanterd\Controllers']
                );


    $routes->post('comprobantes_rd/getComprobantes_rd'
                , 'Comprobantes_rdController::getComprobantes_rd'
                ,['namespace' => 'julio101290\boilerplatecomprobanterd\Controllers']
                );

    $routes->post('comprobantes_rd/getTiposComprobanteAjax'
                , 'Comprobantes_rdController::getComprobantes_rdAjax'
                ,['namespace' => 'julio101290\boilerplatecomprobanterd\Controllers']
                );

});
