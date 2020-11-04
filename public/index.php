<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';
require_once '../src/app/config/config.php';

use App\config\MyPDO;
use App\Router\Router;

$db = new MyPDO();
$router = new Router($_GET, $db);
$router->route();
