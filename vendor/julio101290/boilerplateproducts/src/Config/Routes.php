<?php


$routes->group('admin', function ($routes) {

    $routes->resource('categorias', [
        'filter' => 'permission:categorias-permission',
        'controller' => 'categoriasController',
        'except' => 'show', 
        'namespace' => 'julio101290\boilerplateproducts\Controllers'
    ]);

    $routes->post('categorias/save'
    , 'CategoriasController::save'
    ,['namespace' => 'julio101290\boilerplateproducts\Controllers']
    );
    
    $routes->post('categorias/getCategorias'
    , 'CategoriasController::getCategorias'
    ,['namespace' => 'julio101290\boilerplateproducts\Controllers']
    );

    $routes->post('categorias/buscarFolio'
        , 'CategoriasController::getFolio'
        ,['namespace' => 'julio101290\boilerplateproducts\Controllers']
        );

    $routes->post('categorias/getCategoriasAjax'
    , 'CategoriasController::getCategoriasAjax'
    ,['namespace' => 'julio101290\boilerplateproducts\Controllers']
    );


    $routes->resource('products', [
        'filter' => 'permission:products-permission'
        ,'controller' => 'productsController'
        ,'except' => 'show'
        ,'namespace' => 'julio101290\boilerplateproducts\Controllers'
       
    ]);

    $routes->post('products/save'
    , 'ProductsController::save'
    ,['namespace' => 'julio101290\boilerplateproducts\Controllers']
    );

    $routes->post('products/getProducts'
    , 'ProductsController::getProducts'
     ,['namespace' => 'julio101290\boilerplateproducts\Controllers']
    );


    $routes->get('products/getAllProducts/(:any)'
    , 'ProductsController::getAllProducts/$1'
    ,['namespace' => 'julio101290\boilerplateproducts\Controllers']
    );

    $routes->get('products/barcode/(:any)'
    , 'ProductsController::getBarcodePDF/$1'
    ,['namespace' => 'julio101290\boilerplateproducts\Controllers']
    );

    $routes->post('products/getUnidadSATAjax'
            , 'ProductsController::getUnidadSATAjax'
            ,['namespace' => 'julio101290\boilerplateproducts\Controllers']);


    $routes->post('products/getProductosSATAjax'
    , 'ProductsController::getProductosSATAjax'
    ,['namespace' => 'julio101290\boilerplateproducts\Controllers']
    );

    $routes->post('products/getProductsAjax'
    , 'ProductsController::getProductsAjaxSelect2'
    ,['namespace' => 'julio101290\boilerplateproducts\Controllers']
    );


});
