<?php

declare(strict_types=1);

function showRange(int $startValue, int $endValue): void
{
    $i = $startValue;
    while ($i <= $endValue) {
        echo $i . PHP_EOL;
        $i++;
    }
}

showRange(1, 10);

function calculateFactorial(int $n): int {

    $factorial = 1;
    $i = 1;
    while ($i <= $n) {
        $factorial *= $i;
        $i++;
    }

    return $factorial;
}

$factorial = calculateFactorial(5);

echo 'Factorial is: ' . $factorial . PHP_EOL;

function evenNumbersInRange(int $minValue, int $maxValue): void {

    $i = $minValue;
    while ($i <= $maxValue) {
        if ($i % 2 === 0) {
            echo $i . PHP_EOL;
        }
        $i++;
    }
}

evenNumbersInRange(1, 20);
