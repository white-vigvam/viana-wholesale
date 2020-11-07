<?php

use Slim\App;
use Slim\Views\TwigMiddleware;

return function(App $app){
    $app->addErrorMiddleware(true,false,false);
    // Add Twig-View Middleware
    $app->add(TwigMiddleware::createFromContainer($app));

};