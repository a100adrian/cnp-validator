<?php

require __DIR__ . "/vendor/autoload.php";

use App\src\Application;

$app = new Application();

var_dump($app->isCnpValid($argv[1]));

