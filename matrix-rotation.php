<?php

function getInput() {
    $order = readline('Please enter the order of the square matrix: ');
    $matrix = [];
    for($i=0; $i < $order; $i++)
    {
        $row = readline();
        $matrix[] = explode(' ', $row);
    }
    return $matrix;
}


function rotate($matrix) {
    $n = count($matrix);
    $newMatrix = [];
    for($j=0; $j < $n; $j++) {
        for($i = $n-1; $i >= 0; $i--) {
            $newMatrix[$j][$n-$i-1] = $matrix[$i][$j];
        }
    }
    return $newMatrix;
}

function printMatrix($matrix)
{
    $n = count($matrix);
    for($i=0; $i < $n; $i++) {
        for($j=0; $j < $n; $j++) {
            echo $matrix[$i][$j] . " ";
        }
        echo PHP_EOL;
    }
}


printMatrix(rotate(getInput()));