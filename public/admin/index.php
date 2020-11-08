<?php


use DI\Container;
use Slim\Factory\AppFactory;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$rootDir = dirname(dirname(__DIR__));

require $rootDir . '/vendor/autoload.php';

$container = new Container();

$settings = require $rootDir.'/conf/settings.php';
$settings($container);

$services = require $rootDir.'/conf/services.php';
$services($container);

AppFactory::setContainer($container);

$app = AppFactory::create();



$middlewares = require $rootDir.'/conf/middlewares.php';
$middlewares($app);

$routes = require $rootDir.'/conf/admin/routes.php';
$routes($app);

$app->run();
