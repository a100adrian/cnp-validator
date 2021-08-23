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

    public function check(string $cnp): string
    {
        if($this->validator->verifyCnp($cnp)){
            return "CNP is Valid";
        }
        return "CNP is Invalid";
    }


}
