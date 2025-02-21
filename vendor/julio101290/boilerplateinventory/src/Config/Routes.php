<?php

$routes->group('admin', function ($routes) {


    $routes->resource('inventory', [
        'filter' => 'permission:inventory-permission',
        'controller' => 'InventoryController',
        'except' => 'show',
        'namespace' => 'julio101290\boilerplateinventory\Controllers',
    ]);

    $routes->get('nuevoMovimientoInventario'
                , 'InventoryController::newInventory'
                ,['namespace' => 'julio101290\boilerplateinventory\Controllers']
                );

    $routes->get('newInventory'
                    , 'InventoryController::newInventory'
                    ,['namespace' => 'julio101290\boilerplateinventory\Controllers']
                );

    $routes->get('editInventory/(:any)'
                , 'InventoryController::editInventory/$1'
                ,['namespace' => 'julio101290\boilerplateinventory\Controllers']
                );

    $routes->post('inventory/save'
                , 'InventoryController::save'
                ,['namespace' => 'julio101290\boilerplateinventory\Controllers']
                );

    $routes->post('inventory/getLastCode'
                    , 'InventoryController::getLastCode'
                    ,['namespace' => 'julio101290\boilerplateinventory\Controllers']
                    );
                    
    $routes->get('inventory/report/(:any)'
                , 'InventoryController::report/$1'
                ,['namespace' => 'julio101290\boilerplateinventory\Controllers']
                );

    $routes->get('inventory/(:any)/(:any)/(:any)'
                , 'InventoryController::inventoryFilters/$1/$2/$3'
                ,['namespace' => 'julio101290\boilerplateinventory\Controllers']
                );


    $routes->get('getAllProductsInventory/(:any)/(:any)/(:any)'
                , 'InventoryController::getAllProductsInventory/$1/$2/$3'
                , ['namespace' => 'julio101290\boilerplateinventory\Controllers']
                );


});
