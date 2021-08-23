<?php

namespace App\src\Validators;

interface CnpValidatorInterface extends ConstantsInterface
{
    public function validate(string $cnp): bool;
}
