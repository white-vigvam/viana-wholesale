<?php

use Slim\App;
use Slim\Views\TwigMiddleware;
use App\Middlewares\SessionMiddleware;
use App\Middlewares\CheckAuthMiddleware;

return function(App $app){
    $app->addErrorMiddleware(true,false,false);
    // Add Twig-View Middleware
    $app->add(TwigMiddleware::createFromContainer($app));
    $app->add(new SessionMiddleware());
    //$app->add(new CheckAuthMiddleware());

};