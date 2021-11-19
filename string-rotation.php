<?php

function getInput() {
    $strings = readline('Please enter two strings separated by a space: ');
    $strings = explode(' ', $strings);
    return $strings;
}


function isRotation($s1, $s2) {
    $s1Arr = str_split($s1);
    sort($s1Arr);
    $s1 = implode('', $s1Arr);

    $s2Arr = str_split($s2);
    sort($s2Arr);
    $s2 = implode('', $s2Arr);
    return $s1 === $s2 ? 'TRUE' : 'FALSE';
}



echo isRotation(...getInput());