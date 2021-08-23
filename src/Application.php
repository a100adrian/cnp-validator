<?php

namespace App\src;

use App\src\Validators\CnpValidator;
use App\src\Validators\CnpValidatorInterface;

class Application implements ApplicationInterface
{
    private CnpValidatorInterface $validator;

    public function __construct()
    {
        $this->cnpValidator = new CnpValidator();
    }

    public function isCnpValid(string $cnp): bool
    {
       return $this->cnpValidator->isCnpValid($cnp);
    }


}
