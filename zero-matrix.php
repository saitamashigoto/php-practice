<?php

function getInput() {
    $order = readline('Please enter the order of the matrix (RxC): ');
    $matrix = [];
    for($i=0; $i < $order; $i++)
    {
        $row = readline();
        $matrix[] = explode(' ', $row);
    }
    echo PHP_EOL;
    return $matrix;
}


function doZero($matrix) {
    $r = count($matrix);
    $c = count($matrix[0]);
    $zeroRows = [];
    $zeroColumns = [];
    for($i=0; $i < $r; $i++) {
        for($j = 0; $j < $c; $j++) {
            if ($matrix[$i][$j] == 0) {
                if (!isset($zeroRows[$i])) {
                    $zeroRows[$i] = 1;
                }
                if (!isset($zeroColumns[$j])) {
                    $zeroColumns[$j] = 1;
                }
            }
        }
    }
    foreach ($zeroRows as $row => $value) {
        for ($i=0; $i < $c ; $i++) { 
            $matrix[$row][$i] = 0;
        }
    }
    var_dump(json_encode($zeroRows, JSON_PRETTY_PRINT));
    var_dump(json_encode($zeroColumns, JSON_PRETTY_PRINT));
    foreach ($zeroColumns as $column => $value) {
        for ($i=0; $i < $r ; $i++) { 
            if (isset($zeroRows[$i])) {
                continue;
            }
            $matrix[$i][$column] = 0;
        }
    }
    return $matrix;
}

function printMatrix($matrix)
{
    $n = count($matrix);
    for ($i = 0; $i < $n; $i++) {
        echo implode(" ", $matrix[$i]) . PHP_EOL;
    }
}


printMatrix(doZero(getInput()));