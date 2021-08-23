<?php

namespace App\src\Validators;

interface ConstantsInterface
{
    const LENGTH = 13;

    const CONTROL_VALUES = ['2', '7', '9', '1', '4', '6', '3', '5', '8', '2', '7', '9'];

    /*
     * Format S AA LL ZZ JJ NNN C
     * S: Gender
     * AA: Year of Birth
     * LL: Month of Birth
     * ZZ: Day of Birth
     * JJ: County of Birth
     * NNN: Birth Order Number
     * C: Control Number
     */
    const SUBSTRING_S = [0, 1];
    const SUBSTRING_AA = [1, 2];
    const SUBSTRING_LL = [3, 2];
    const SUBSTRING_ZZ = [5, 2];
    const SUBSTRING_JJ = [7, 2];
    const SUBSTRING_NNN = [9, 3];
    const SUBSTRING_C = [-1];
    const SUBSTRING_TWELVE_DIGITS = [0, 12];

    /*
     * Generation 1: First generation: Persons are born between 1800 and 1899
     * Generation 2: Second generation: Persons are born between 1900 and 1999
     * Generation 3: Third generation: Persons are born between 2000 and 2099
     * Foreigner with residency 4: For foreigners with Romanian residency: Persons are born between 1900 and 1999
     * Foreigner 5: For foreigners: Persons are born between 1900 and 1999
     */
    const S = [
        'Generation 1' => [
            'gender' => [
                3 => 'male',
                4 => 'female'
            ],
            'year_range' => [1800, 1899]
        ],
        'Generation 2' => [
            'gender' => [
                1 => 'male',
                2 => 'female'
            ],
            'year_range' => [1900, 1999]
        ],
        'Generation 3' => [
            'gender' => [
                5 => 'male',
                6 => 'female'
            ],
            'year_range' => [2000, 2099]
        ],
        'Foreigner with residency' => [
            'gender' => [
                7 => 'male',
                8 => 'female'
            ],
            'year_range' => [1900, 1999]
        ],
        'Foreigner' => [
            'gender' => [
                9 => 'foreigner'
            ],
            'year_range' => [1900, 1999]
        ]
    ];

    const JJ = [
        '01' => 'Alba', '02' => 'Arad', '03' => 'Arges',
        '04' => 'Bacau', '05' => 'Bihor', '06' => 'Bistrita-',
        '07' => 'Botosani', '08' => 'Brasov', '09' => 'Braila',

        '10' => 'Buzau', '11' => 'Caras-', '12' => 'Cluj',
        '13' => 'Constanta', '14' => 'Covasna', '15' => 'Dambovita',
        '16' => 'Dolj', '17' => 'Galati', '18' => 'Gorj',

        '19' => 'Harghita', '20' => 'Hunedoara', '21' => 'Ialomita',
        '22' => 'Iasi', '23' => 'Ilfov', '24' => 'Maramures',
        '25' => 'Mehedinti', '26' => 'Mures', '27' => 'Neamt',

        '28' => 'Olt', '29' => 'Prahova', '30' => 'Satu Mare',
        '31' => 'Salaj', '32' => 'Sibiu', '33' => 'Suceava',
        '34' => 'Teleorman', '35' => 'Timis', '36' => 'Tulcea',

        '37' => 'Vaslui', '38' => 'Valcea', '39' => 'Vrancea',
        '40' => 'Bucuresti', '41' => 'Bucuresti', '42' => 'Bucuresti',
        '43' => 'Bucuresti', '44' => 'Bucuresti', '45' => 'Bucuresti',

        '46' => 'Bucuresti', '51' => 'Calarasi', '52' => 'Giurgiu'
    ];
}