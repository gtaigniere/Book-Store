<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';
require_once '../src/app/config/config.php';

use App\Router\Router;

$router = new Router($_GET);
$router->route();
