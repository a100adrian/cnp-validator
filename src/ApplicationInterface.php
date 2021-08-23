<?php 

namespace App\src;

interface ApplicationInterface
{
  public function isCnpValid(string $cnp): bool;
}
