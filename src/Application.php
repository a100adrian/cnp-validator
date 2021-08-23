<?php

namespace App\src;

use App\src\Validators\CnpValidator;
use App\src\Validators\CnpValidatorInterface;

class Application
{
    private CnpValidatorInterface $validator;

    public function __construct()
    {
        $this->cnpValidator = new CnpValidator();
    }

    public function isCnpValid(string $cnp): bool
    {
       return $this->cnpValidator->validate($cnp);
    }


}
