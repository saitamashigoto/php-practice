<?php

function isStringContainsUniqueCharaters($str) {
    $strArr = str_split($str);
    $charFrequencyArray = [];
    foreach ($strArr as $char) {
        if (isset($charFrequencyArray[$char])) {
            return false;
        } else {
            $charFrequencyArray[$char] = 1;
        }
    }
    return true;
}
echo isStringContainsUniqueCharaters($argv[1]) . PHP_EOL;