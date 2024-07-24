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

//$randomArray = range(rand(1,10), rand(15, 25), 0.7); // чи підпадає такий варіант створення масиву під умову ДЗ?
//shuffle($randomArray);

print_r($randomArray);

function findMinAndMax(array $array): array {

    $min = min($array);
    $max = max($array);

    return [$min, $max];
}

[$min, $max] = findMinAndMax($randomArray);

echo 'Min in array is: ' . $min . PHP_EOL;
echo 'Max in array is: ' . $max . PHP_EOL;

 usort($randomArray, fn($a, $b) => $a <=> $b);

 print_r($randomArray);
