<?php

$routes->group('admin', function ($routes) {


    $routes->resource('xml', [
        'filter' => 'permission:xml-permission',
        'controller' => 'xmlController',
        'except' => 'show',
        'namespace' => 'julio101290\boilerplateCFDI\Controllers',
    ]);

    $routes->post('xml/save'
                , 'XmlController::save'
                ,['namespace' => 'julio101290\boilerplateCFDI\Controllers']
                );
    $routes->post('xml/getXml'
                , 'XmlController::getXml'
                ,['namespace' => 'julio101290\boilerplateCFDI\Controllers']
                );

    $routes->get('xml/generarPDF/(:any)'
                , 'XmlController::generarPDF/$1'
                ,['namespace' => 'julio101290\boilerplateCFDI\Controllers']
                );

    $routes->get('xml/descargaXML/(:any)'
                , 'XmlController::descargaXML/$1'
                ,['namespace' => 'julio101290\boilerplateCFDI\Controllers']
                );

    $routes->get('xml/generarPDFDesdeVenta/(:any)'
                , 'XmlController::generaPDFDesdeVenta/$1'
                ,['namespace' => 'julio101290\boilerplateCFDI\Controllers']
                );

    $routes->get('xml/generarCartaPortePDFDesdeVenta/(:any)'
                , 'XmlController::generaCartaPortePDFDesdeVenta/$1'
                ,['namespace' => 'julio101290\boilerplateCFDI\Controllers']
                );

    $routes->get('xmlFilters/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)'
                , 'XmlController::xmlFilters/$1/$2/$3/$4/$5/$6/$7/$8/$9/$10/$11'
                ,['namespace' => 'julio101290\boilerplateCFDI\Controllers']
                );

    $routes->get('xml/descargarXMLS/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)'
                , 'XmlController::descargarXMLS/$1/$2/$3/$4/$5/$6/$7/$8/$9/$10/$11/$12'
                ,['namespace' => 'julio101290\boilerplateCFDI\Controllers']
                );

    $routes->post('xml/cancelaCFDI'
                , 'XmlController::cancelaCFDI'
                ,['namespace' => 'julio101290\boilerplateCFDI\Controllers']
                );


});
