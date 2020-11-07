<?php

use DI\Container;
use Monolog\Logger;
use Slim\Views\Twig;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Monolog\Handler\StreamHandler;

return function(Container $container){
    
    // Doctrine Entity Manager ($em)
   $container->set('em', function($container){

    $settings = $container->get('settings');
    $isDevMode = $settings['isDevMode'];
    $pathToEntities = $settings['em']['pathToEntities'];
    $config = Setup::createAnnotationMetadataConfiguration($pathToEntities, $isDevMode);
    
    // database configuration parameters
    $connection = $settings['em']['connection'];
    
    // obtaining the entity manager
    $entityManager = EntityManager::create($connection, $config);
    return $entityManager;
   });

   $container->set('logger', function($container){
    $settings = $container->get('settings');
    $log = new Logger('appLog');
    $log->pushHandler(new StreamHandler($settings['logger']['logFilePath'], Logger::WARNING));
    return $log;
   });

   $container->set('view', function($container){
    $settings = $container->get('settings');
    return Twig::create($settings['twig']['pathToTemplates'], ['cache' => $settings['twig']['pathToCache']]);
   });

};