<?php

$routes->group('admin', function ($routes) {




    $routes->resource('quotes', [
        'filter' => 'permission:quotes-permission',
        'controller' => 'QuotesController',
        'except' => 'show',
        'namespace' => 'julio101290\boilerplatequotes\Controllers',
    ]);

    $routes->get('newQuotes'
                , 'QuotesController::newQuote'
                ,['namespace' => 'julio101290\boilerplatequotes\Controllers']
                );

    $routes->get('editQuote/(:any)'
                , 'QuotesController::editQuote/$1'
                ,['namespace' => 'julio101290\boilerplatequotes\Controllers']
                );

    $routes->get('convertQuote/(:any)'
                , 'QuotesController::convertQuote/$1'
                ,['namespace' => 'julio101290\boilerplatequotes\Controllers']
                );

    $routes->post('quotes/save'
                , 'QuotesController::save'
                ,['namespace' => 'julio101290\boilerplatequotes\Controllers']
                );


    $routes->post('quotes/getLastCode'
                , 'QuotesController::getLastCode'
                ,['namespace' => 'julio101290\boilerplatequotes\Controllers']
                );

    $routes->get('quotes/report/(:any)'
                , 'QuotesController::report/$1'
                ,['namespace' => 'julio101290\boilerplatequotes\Controllers']
                );

    $routes->get('quotes/(:any)/(:any)'
                , 'QuotesController::quotesFilters/$1/$2'
                ,['namespace' => 'julio101290\boilerplatequotes\Controllers']
                );


});
