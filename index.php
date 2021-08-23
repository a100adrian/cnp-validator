<?php

require __DIR__ . "/vendor/autoload.php";

use App\src\Application;

$cnpApp = new Application();

var_dump($cnpApp->isCnpValid($argv[1]));

