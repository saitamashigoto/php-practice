<?php

function compress($str) {
    $arr = str_split($str);
    $len = count($arr);
    $map = [];
    $charPosition = 0;
    for ($i = 0; $i < $len; $i++) {
        $char = $arr[$i];
        if (!isset($map[$charPosition])) {
            $map[$charPosition] = [
                'key' => $char,
                'value' => 1,
            ];
        } elseif (isset($map[$charPosition]) && $map[$charPosition]['key'] === $char) {
            $map[$charPosition]['value']++;
        } else {
            $map[++$charPosition] = [
                'key' => $char,
                'value' => 1,
            ];
        }
    }
    $compressedLength = 0;
    $compressedString = '';
    for ($i = 0; $i <= $charPosition; $i++) {
        $intermediateComm = $map[$i]['key'] . $map[$i]['value'];
        $compressedString .= $intermediateComm;
        $compressedLength += strlen($intermediateComm);
    }
    if ($compressedLength >= $len) {
        return $str;
    } else {
        return $compressedString;
    }
}


echo compress($argv[1]) . PHP_EOL;