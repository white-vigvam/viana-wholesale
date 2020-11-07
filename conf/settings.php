<?php

use DI\Container;

return function(Container $container){
   
    $container->set('settings', function () {
        $rootDir = dirname(__DIR__);

        $settings = [
            'siteName'=>'viana wholesale',
            'isDevMode'=>true,
            'em'=>[
                'connection'=>[
                    'driver'=>'pdo_mysql', // pdo_sqlite
                    'dbName'=>'',
                    'dbUserName'=>'',
                    'dbPassword'=>'',
                ],
                'pathToEntities'=>[
                    $rootDir.'/src/Entities'
                ],
            ],
            'logger'=>[
                'logFilePath'=>$rootDir.'/logs/appLog.log',
            ],
            'twig'=>[
                'pathToTemplates'=>$rootDir.'/templates',
                'pathToCache'=>$rootDir.'/tmp/twigcache'
            ]
        ];
        return $settings;
    });
    
};