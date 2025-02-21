<?php

$routes->group('admin', function ($routes) {


    $routes->resource('sells', [
        'filter' => 'permission:sells-permission',
        'controller' => 'SellsController',
        'except' => 'show',
        'namespace' => 'julio101290\boilerplatesells\Controllers',
    ]);

    $routes->get('newSells'
            , 'SellsController::newSell'
            , ['namespace' => 'julio101290\boilerplatesells\Controllers']
    );

    $routes->get('editSell/(:any)'
            , 'SellsController::editSell/$1'
            , ['namespace' => 'julio101290\boilerplatesells\Controllers']
    );

    $routes->post('sells/save'
            , 'SellsController::save'
            , ['namespace' => 'julio101290\boilerplatesells\Controllers']
    );

    $routes->post('sells/getLastCode'
            , 'SellsController::getLastCode'
            , ['namespace' => 'julio101290\boilerplatesells\Controllers']
    );

    $routes->get('sells/report/(:any)'
            , 'SellsController::report/$1'
            , ['namespace' => 'julio101290\boilerplatesells\Controllers']
    );
    $routes->get('sells/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)'
            , 'SellsController::sellsFilters/$1/$2/$3/$4/$5/$6'
            , ['namespace' => 'julio101290\boilerplatesells\Controllers']
    );

    $routes->get('listSells/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)'
            , 'SellsController::sellsListFilters/$1/$2/$3/$4/$5/$6'
            , ['namespace' => 'julio101290\boilerplatesells\Controllers']
    );

    $routes->get('reporteVentas'
            , 'SellsController::reportSellsProducts'
            , ['namespace' => 'julio101290\boilerplatesells\Controllers']
    );

    $routes->get('sellsReport/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)'
            , 'SellsController::sellsReport/$1/$2/$3/$4/$5/$6'
            , ['namespace' => 'julio101290\boilerplatesells\Controllers']
    );

    $routes->post('payments/save'
            , 'PaymentsController::save'
            , ['namespace' => 'julio101290\boilerplatesells\Controllers']
    );

    $routes->get('payments/getPayments/(:any)'
            , 'PaymentsController::ctrGetPayments/$1'
            , ['namespace' => 'julio101290\boilerplatesells\Controllers']
    );
    $routes->get('payments/delete/(:any)'
            , 'PaymentsController::delete/$1'
            , ['namespace' => 'julio101290\boilerplatesells\Controllers']
    );

    $routes->get('xmlenlace/getXMLEnlazados/(:any)'
            , 'SellsController::getXMLEnlazados/$1'
            , ['namespace' => 'julio101290\boilerplatesells\Controllers']
    );

    

    $routes->get('xmlenlace/getXMLEnlazadosCartaPorte/(:any)'
            , 'SellsController::getXMLEnlazadosCartaPorte/$1'
            , ['namespace' => 'julio101290\boilerplatesells\Controllers']
    );
    $routes->get('xml/xmlSinAsignar/(:any)'
            , 'SellsController::xmlSinAsignar/$1'
            , ['namespace' => 'julio101290\boilerplatesells\Controllers']
    );

    $routes->get('enlacexml/delete/(:num)'
            , 'EnlacexmlController::delete/$1'
            , ['namespace' => 'julio101290\boilerplatesells\Controllers']
    );

    $routes->post('xmlenlace/enlazaVenta'
            , 'SellsController::enlazaVenta'
            , ['namespace' => 'julio101290\boilerplatesells\Controllers']
    );

    $routes->get('facturar/(:any)'
            , 'FacturaElectronicaController::timbrar/$1'
            , ['namespace' => 'julio101290\boilerplatesells\Controllers']
    );

    $routes->get('xml/generarPDFDesdeVenta/(:any)'
            , 'SellsController::generaPDFDesdeVenta/$1'
            , ['namespace' => 'julio101290\boilerplatesells\Controllers']
    );

    $routes->get('xml/descargaAcuseCancelacion/(:any)'
            , 'SellsController::descargaAcuseCancelacion/$1'
            , ['namespace' => 'julio101290\boilerplatesells\Controllers']
    );
});
