<?php

function check($str1, $str2) {
    $len1 = strlen($str1);
    $len2 = strlen($str2);
    $arr1 = str_split($str1);
    $arr2 = str_split($str2);

    if (abs($len1 - $len2) > 1) {
        return 'FALSE';
    }

    $mismatchCount = 0;
    $index1 = 0;
    $index2 = 0;
    while ($mismatchCount < 2 && $index1 < $len1 && $index2 < $len2) {
        if ($arr1[$index1] === $arr2[$index2]) {
           $index2++; 
           $index1++;
        } else {
            if ($len2 > $len1) {
                $index2++;
            } elseif($len2 < $len1) {
                $index1++;
            } else {
                $index2++; 
                $index1++;
            }
            $mismatchCount++;
        }
    }
    if ($mismatchCount > 1) {
        return 'FALSE';
    } else {
        return 'TRUE';
    }
}


echo check($argv[1], $argv[2]) . PHP_EOL;