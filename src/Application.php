<?php

namespace App\src;

use App\src\Validators\CnpValidator;
use App\src\Validators\CnpValidatorInterface;

class Application
{
    private CnpValidatorInterface $validator;

    public function __construct()
    {
        $this->validator = new CnpValidator();
    }

    public function verifyCnp(string $cnp): array
    {
        return $this->validator->check($cnp);
    }


}