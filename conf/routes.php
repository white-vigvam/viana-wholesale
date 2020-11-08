<?php
use App\Controllers\HomeController;
use Slim\Routing\RouteCollectorProxy;
use App\Controllers\WelcomeController;
use App\Middlewares\CheckAuthMiddleware;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

 return function($app){
     /*
    $app->get('/hello/{name}', function (Request $request, Response $response, $args) {
        $response->getBody()->write($args['name']);
        return $response;
    });
    
    $app->get('/hello', HomeController::class.':sayHello');
    */
    
    

    $app->get('/welcome', WelcomeController::class.':register');

    $app->group('/wholesale', function (RouteCollectorProxy $group) {

        $group->get('/', function (Request $request, Response $response, $args) {
        
            $response->getBody()->write("Hello world!");
            return $response;
        });

    })->add(CheckAuthMiddleware::class);

 };