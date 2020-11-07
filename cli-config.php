<?php

use DI\Container;
use Doctrine\ORM\Tools\Console\ConsoleRunner;


$rootDir = __DIR__;

require $rootDir . '/vendor/autoload.php';

$container = new Container();

$settings = require $rootDir.'/conf/settings.php';
$settings($container);

$services = require $rootDir.'/conf/services.php';
$services($container);

$em = $container->get('em');
return ConsoleRunner::createHelperSet($em);
