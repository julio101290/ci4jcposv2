<?php


$routes->group('admin', function ($routes) {

    $routes->resource('custumers', [
        'filter' => 'permission:custumers-permission',
        'controller' => 'custumersController',
        'except' => 'show'
        ,'namespace' => 'julio101290\boilerplatecustumers\Controllers'
    ]);

    $routes->post('custumers/save'
    , 'CustumersController::save'
    ,['namespace' => 'julio101290\boilerplatecustumers\Controllers']
    );

    $routes->post('custumers/getCustumers'
    , 'CustumersController::getCustumers'
    ,['namespace' => 'julio101290\boilerplatecustumers\Controllers']
    );
    
    $routes->post('custumers/getCustumersAjax'
    , 'CustumersController::getCustumersAjax'
    ,['namespace' => 'julio101290\boilerplatecustumers\Controllers']
    );

    $routes->post('custumers/getCustumersTodosAjax'
    , 'CustumersController::getCustumersTodosAjax'
    ,['namespace' => 'julio101290\boilerplatecustumers\Controllers']
    );

});
