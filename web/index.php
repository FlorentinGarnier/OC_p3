<?php

use app\Application;
use app\Autoloader;

require '../app/Autoloader.php';

Autoloader::register();

$app = new Application(new \app\Router());

$app->start();