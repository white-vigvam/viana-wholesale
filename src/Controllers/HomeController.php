<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class HomeController extends BaseController {
    public function sayHello(Request $request, Response $response, $args){
        
        return  $this->container->get('view')->render($response,'index.html',$args);
       
        //return $response;
       
    }
}