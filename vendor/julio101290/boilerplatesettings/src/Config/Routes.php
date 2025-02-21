<?php

$routes->group('admin', function ($routes) {


    $routes->resource('settings', [
        'filter' => 'permission:settings-permissions',
        'namespace' => 'julio101290\boilerplatesettings\Controllers',
        'controller' => 'SettingsController',
    ]);

    /**
     * Save Settings Route
     */
   
    
    $routes->post('settings/save', 'SettingsController::save', ['namespace' => 'julio101290\boilerplatesettings\Controllers']);



    //$routes->get('settings', 'SettingsController::index');
});
