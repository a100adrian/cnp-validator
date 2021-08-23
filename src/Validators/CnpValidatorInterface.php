<?php

namespace App\src\Validators;

interface CnpValidatorInterface extends ConstantsInterface
{
    public function isCnpValid(string $cnp): bool;
}
