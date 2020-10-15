<?php

use App\Router\Router;

require_once dirname(__DIR__) . '/vendor/autoload.php';
require_once '../src/app/config/config.php';

$router = new Router($_GET);
$router->route();
