<?php

function convertNumberToWord($number)
{
    $words = [
        1 => 'First',
        2 => 'Second',
        3 => 'Third',
        4 => 'Fourth',
        5 => 'Fifth',
        6 => 'Sixth',
        7 => 'Seventh',
        8 => 'Eighth',
        9 => 'Ninth',
        10 => 'Tenth',
        // Add more mappings as needed
    ];

    return isset($words[$number]) ? $words[$number] : '';
}
