<?php

$routes->group('admin', function ($routes) {



    $routes->resource('seriesfacturaelectronica', [
        'filter' => 'permission:seriesfacturaelectronica-permission',
        'controller' => 'seriesfacturaelectronicaController',
        'except' => 'show',
        'namespace' => 'julio101290\boilerplateCFDIElectronicSeries\Controllers',
    ]);

    $routes->post('seriesfacturaelectronica/save'
            , 'SeriesfacturaelectronicaController::save'
            , ['namespace' => 'julio101290\boilerplateCFDIElectronicSeries\Controllers']
    );
    
    $routes->post('seriesfacturaelectronica/getSeriesfacturaelectronica'
            , 'SeriesfacturaelectronicaController::getSeriesfacturaelectronica'
            , ['namespace' => 'julio101290\boilerplateCFDIElectronicSeries\Controllers']
    );
    
});
