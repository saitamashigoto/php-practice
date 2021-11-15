<?php

function countChars($str) {
    $strArr = str_split($str);
    $charFrequencyArray = [];
    foreach ($strArr as $char) {
        if (empty($charFrequencyArray[$char])) {
            $charFrequencyArray[$char] = 1;
        } else {
            $charFrequencyArray[$char] += 1;
        }
    }
    return $charFrequencyArray;
}

function check($str) {
    $str = str_replace(" ", "", $str);
    $str = strtolower($str);
    $charArr = countChars($str);
    $len = strlen($str);
    if ($len % 2 === 0) {
        foreach ($charArr as $freq) {
            if ($freq % 2 !==0) {
                return 'FALSE';
            }
        }
    } else {
        $oddFound = 0;
        foreach ($charArr as $freq) {
            if ($freq % 2 !==0) {
                if ($oddFound === 0) {
                    $oddFound++;
                } elseif ($oddFound===1) {
                    return 'FALSE';
                }
            }
        }
    }
    return 'TRUE';
}

echo check($argv[1]) . PHP_EOL;