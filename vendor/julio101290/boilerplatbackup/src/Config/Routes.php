<?php


$routes->group('admin', function ($routes) {


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

    

    //$routes->get('settings', 'SettingsController::index');
});
