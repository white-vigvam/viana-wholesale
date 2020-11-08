<?php
use App\Controllers\HomeController;
use Slim\Interfaces\RouteCollectorProxyInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

 return function($app){
   
    $app->get('/admin/', function($response, $request, $args){
        echo "from admin";
        return $request;
    });

    $app->get('/admin/{name}', function($response, $request, $args){
        echo "from admin ".$args['name'];
        return $request;
    });
 };