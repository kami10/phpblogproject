<?php

session_start();

use App\System\App;
use App\System\ServiceManager;

require '../vendor/autoload.php';


$config = include __DIR__ . '/../config/global.php';
$serviceManager = new ServiceManager($config);


/** @var $app */
$app = $serviceManager->get(App::class);
$app->run();