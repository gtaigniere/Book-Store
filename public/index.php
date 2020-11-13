<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

use App\router\Router;


$router = new Router($_GET, $_POST);
$router->route();
