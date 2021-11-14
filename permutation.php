<?php

function getCharsFrequency($str) {
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

function check($str1, $str2) {
    $len1 = strlen($str1);
    $len2 = strlen($str2);
    
    if ($len1 < $len2) {
        $source = $str1;
        $target = $str2;
    } else {
        $source = $str2;
        $target = $str1;
    }
    $sourceStrMap = getCharsFrequency($source);
    $targetStrMap = getCharsFrequency($target);
    foreach($sourceStrMap as $char => $frequency) {
        if (empty($targetStrMap[$char]) || $targetStrMap[$char] !== $sourceStrMap[$char]) {
            return 'FALSE';
        }
    }
    return 'TRUE';
}

echo check($argv[1], $argv[2]) . PHP_EOL;