<?php


$routes->group('admin', function ($routes) {

/*
    $routes->get('backups/downloadBackup/(:any)'
            , 'BackupsController::downloadBackup/$1'
            ,['namespace' => 'julio101290\boilerplatebackup\Controllers']
            );
    
    $routes->get('backups/restore/(:any)'
            , 'BackupsController::restoreBackup/$1'
            , ['namespace' => 'julio101290\boilerplatebackup\Controllers']);

    $routes->resource('backups', [
        'filter' => 'permission:backups-permissions',
        'namespace' => 'julio101290\boilerplatebackup\Controllers',
        'controller' => 'backupsController',
    ]);

    $routes->post('backups/save', 'BackupsController::save', ['namespace' => 'julio101290\boilerplatebackup\Controllers']);
    $routes->post('backups/getBackups', 'BackupsController::getBackups', ['namespace' => 'julio101290\boilerplatebackup\Controllers']);

*/
    
    $routes->get('empresa/usuariosPorEmpresa/(:any)'
    , 'EmpresasController::usuariosPorEmpresa/$1'
    , ['namespace' => 'julio101290\boilerplatecompanies\Controllers']);

    $routes->resource('empresas', [
        'filter' => 'permission:empresas-permisos',
        'namespace' => 'julio101290\boilerplatecompanies\Controllers',
        'controller' => 'EmpresasController',
        'except' => 'show'
    ]);

    $routes->post('empresas/save'
    , 'EmpresasController::save'
    , ['namespace' => 'julio101290\boilerplatecompanies\Controllers']);

    $routes->post('empresas/obtenerEmpresa'
    , 'EmpresasController::obtenerEmpresa'
    , ['namespace' => 'julio101290\boilerplatecompanies\Controllers']);

    

    $routes->post('empresa/activarDesactivar'
    , 'EmpresasController::activarDesactivar'
    , ['namespace' => 'julio101290\boilerplatecompanies\Controllers']);

    

    //$routes->get('settings', 'SettingsController::index');
});
