<?php

namespace App\src\Validators;

interface CnpValidatorInterface extends ConstantsInterface
{
    public function check(string $cnp): array;
}