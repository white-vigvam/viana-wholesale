<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class WelcomeController extends BaseController {
    public function register(Request $request, Response $response, $args){
        echo "You must be authorized!";
        return $response;

    }
}