<?php


namespace App\Middlewares;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\MiddlewareInterface as Middleware;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;


class CheckAuthMiddleware implements Middleware
{
	

	/**
	 * {@inheritdoc}
	 */
	public function process(Request $request, RequestHandler $handler): Response
	{
        
        $session = $request->getAttribute('session');
        $response = $handler->handle($request);
        

		if ($session['logged']) {
			$request = $request->withHeader('Location', '/login');
		}else{
            $request = $request->withHeader('Location', '/nologin');

        }

		return $handler->handle($request)->withHeader('Location','/welcome');
	}


}



