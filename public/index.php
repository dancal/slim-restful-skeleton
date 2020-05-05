<?php

use Slim\Factory\AppFactory;
use DI\ContainerBuilder;
use SlimRestful\SlimLoader;

require_once __DIR__ . '/../vendor/autoload.php';

$containerBuilder = new ContainerBuilder();
$loader = SlimLoader::getInstance();

//Load settings
$loader->loadSettings($containerBuilder, __DIR__ . '/../config/config.json');
$container = $containerBuilder->build();

//Instanciate app
AppFactory::setContainer($container);
$app = AppFactory::create();

//Load middlewares and routes
$loader->loadMiddlewares($app)
    ->loadRoutes($app, __DIR__ . '/../src/routes/routes.json');

//Run app
$app->run();
