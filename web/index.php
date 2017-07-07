<?php

use app\Application;
use app\Autoloader;
use app\Request;
use app\Router;

const __ROOT_DIR__ = __DIR__ . "/../";

require '../app/Autoloader.php';

Autoloader::register();

$router = new Router(Request::getRequest());

/*
 * Déclaration des pseudos Routes
 */
$router->add('article', 'src\\Front\\Controller\\ArticleController');


$app = new Application($router);

$app->start();
$app->sendResponse();