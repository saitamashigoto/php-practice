<?php

function urlify($str) {
    $strArr = str_split($str);
    $charArr = [];
    foreach ($strArr as $char) {
        if ($char === ' ') {
            addSpaceToStrArr($charArr);
        } else {
            $charArr[] = $char;
        }
    }
    return implode('', $charArr);
}

function addSpaceToStrArr(&$strArr) {
    $strArr[] = '%';
    $strArr[] = '2';
    $strArr[] = '0';
}


echo urlify($argv[1]) . PHP_EOL;