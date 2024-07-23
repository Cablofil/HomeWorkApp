<?php

declare(strict_types=1);

function CreateAndFillArray(int $length = 5, int $minValue = 1, int $maxValue = 10): array {

    $array = [];
    if ($minValue <= $maxValue) {
        for ($i = 0; $i < $length; $i++) {
            $array[] = rand($minValue, $maxValue);
        }
    }

    return $array;
}

$randomArray = CreateAndFillArray( 15, 1, 12);

print_r($randomArray);

function arraySum(array $array): int {

    $sum = 0;
    foreach ($array as $number) {
        $sum += $number;
    }

    return $sum;
}

$sumOfNumbers = arraySum($randomArray);

echo 'Sum of numbers in array is: ' . $sumOfNumbers . PHP_EOL;

function arrayProduct (array $array): int {

    $product = 1;
    foreach ($array as $multipliers) {
        $product *= $multipliers;
    }

    return $product;
}

$productOfNumbers = arrayProduct($randomArray);

echo 'Product of numbers in array is: ' . $productOfNumbers . PHP_EOL;

function numberCounter(array $array, int $number): int {

    $counter = 0;
    foreach ($array as $value) {
        if ($value === $number) {
            $counter ++;
        }
    }

    return $counter;
}

$count = numberCounter($randomArray, 5);

echo "Count in array $count \n";

function evenlyDivisible(array $array, int $number): void {

    foreach ($array as $value) {
        if (($value % $number) === 0) {
            echo $value . PHP_EOL;
        }
    }
}

evenlyDivisible($randomArray, 3);



