<?php

use app\Application;
use app\Autoloader;
use app\Request;
use app\Router;

require '../app/Autoloader.php';

Autoloader::register();

$request = Request::getRequest();
$router = new Router($request);
$app = new Application($router);

$app->start();