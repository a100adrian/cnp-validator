<?php

require __DIR__ . "/vendor/autoload.php";

use App\src\Application;

$cnpApp = new Application();

$response = $cnpApp->verifyCnp($argv[1]);

if($response['message'] != "CNP is Invalid")
{
    echo "\n" . $response['message'] . "\n\n";

    echo "Gender: " . $response['info']['gender'] . "\n";
    echo "Type: " . $response['info']['type'] . "\n";
    echo "Place of birth: " . $response['info']['place_of_birth'] . "\n";
    echo "Date of birth: " . $response['info']['date_of_birth']['day'] . "-" .
        $response['info']['date_of_birth']['month'] . "-" .
        $response['info']['date_of_birth']['year'] . "\n";
}   else {
    echo $response['message'];
}
