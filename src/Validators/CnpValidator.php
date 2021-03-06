<?php

namespace App\src\Validators;

class CnpValidator implements CnpValidatorInterface
{
    public function isCnpValid(string $cnp): bool
    {
        if($this->isFormat($this->trimCnp($cnp))){
            $splitArr = $this->splitCnp($cnp);
            if($this->isDateOfBirthValid(
                $splitArr['S'], $splitArr['ZZ'],
                $splitArr['LL'], $splitArr['AA'],
                $splitArr['JJ'])
            )
            {
                if($this->getCounty($splitArr['JJ']) !== null){
                    if($this->isControlNumberValid(
                        $splitArr['C'],
                        substr($cnp, self::SUBSTRING_TWELVE_DIGITS[0], self::SUBSTRING_TWELVE_DIGITS[1])
                    )){
                        return true;
                    }
                }
            }
        }

        return false;
    }

    private function trimCnp(string $cnp): string
    {
        $cnp = str_replace(' ', '', $cnp);
        $cnp = str_replace('-', '', $cnp);

        return str_replace('.', '', $cnp);
    }

    private function isFormat(string $cnp): bool
    {

        $regex = "/^[0-9]{".self::LENGTH."}+$/";

        if(preg_match($regex, $cnp)){
            return true;
        }

        return false;
    }

    private function splitCnp(string $cnp): array
    {
        return [
            'S'     => intval(substr($cnp, self::SUBSTRING_S[0], self::SUBSTRING_S[1])),
            'AA'    => intval(substr($cnp, self::SUBSTRING_AA[0], self::SUBSTRING_AA[1])),
            'LL'    => intval(substr($cnp, self::SUBSTRING_LL[0], self::SUBSTRING_LL[1])),
            'ZZ'    => intval(substr($cnp, self::SUBSTRING_ZZ[0], self::SUBSTRING_ZZ[1])),
            'JJ'    => substr($cnp, self::SUBSTRING_JJ[0], self::SUBSTRING_JJ[1]),
            'NNN'   => intval(substr($cnp, self::SUBSTRING_NNN[0], self::SUBSTRING_NNN[1])),
            'C'     => intval(substr($cnp, self::SUBSTRING_C[0]))
        ];
    }

    private function isDateOfBirthValid(int $s, int $day, int $month, int $year, string $countyCode): bool
    {
        $dateOfBirthInfo = $this->getBirthInfo($s, $day, $month, $year, $countyCode);
        if(checkdate($dateOfBirthInfo['date_of_birth']['month'],
            $dateOfBirthInfo['date_of_birth']['day'],
            $dateOfBirthInfo['date_of_birth']['year'])
        )
        {
            return true;
        }

        return false;
    }

    private function getBirthInfo(int $s, int $day, int $month, int $year, int $countyCode): ?array
    {
        foreach (self::S as $type => $value)
        {
            $genders = $value['gender'];
            $yearRanges = $value['year_range'];

            foreach ($genders as $key => $gender){
                if($key == $s
                    && $year >= intval(substr($yearRanges[0], -2))
                    && $year <= intval(substr($yearRanges[1], -2))
                )
                {
                    return [
                        'type' => $type,
                        'gender' => $gender,
                        'place_of_birth' => $this->getCounty($countyCode),
                        'date_of_birth' => [
                            'day' => $day,
                            'month' => $month,
                            'year' => intval(substr($yearRanges[0], 0, 2) . $year)
                        ]
                    ];
                }
            }
        }

        return null;
    }

    private function getCounty(string $countyCode): ?string
    {
        foreach(self::JJ as $key => $county){
            if($key == $countyCode){
                return $county;
            }
        }
        return null;
    }

    private function isControlNumberValid(int $lastChar, int $twelveDigits): bool
    {
        if($lastChar === $this->getControlNumber($twelveDigits)){
            return true;
        }

        return false;
    }

    private function getControlNumber(int $n): int
    {
        $n = array_map('intval', str_split($n));
        $k = 0;

        for($i = 0; $i < 12; $i++){
            $k += self::CONTROL_VALUES[$i] * $n[$i];
        }

        $k %= 11;

        if($k == 10){
            $k = 1;
        }

        return $k;
    }
}
