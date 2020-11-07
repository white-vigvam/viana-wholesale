<?php
use App\Controllers\HomeController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

 return function($app){
    $app->get('/hello/{name}', function (Request $request, Response $response, $args) {
        $response->getBody()->write($args['name']);
        return $response;
    });
    
    $app->get('/hello', HomeController::class.':sayHello');
    
    $app->get('/', function (Request $request, Response $response, $args) {
        // $settings = $this->get('settings');
        // var_dump($this);
        $response->getBody()->write("Hello world!");
        return $response;
    });
 };