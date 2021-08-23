<?php

require __DIR__ . "/vendor/autoload.php";

use App\src\Application;

$cnpApp = new Application();

echo $cnpApp->verifyCnp($argv[1]);

