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

    public function isCnpValid(string $cnp): bool
    {
        if($this->validator->isCnpValid($cnp)){
            return "CNP is Valid";
        }
        return "CNP is Invalid";
    }


}
