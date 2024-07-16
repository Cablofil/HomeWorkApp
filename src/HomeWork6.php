<?php

declare(strict_types=1);

$anonFunction = function (float $result): void {
    echo "Received result is: $result" . PHP_EOL;
};
function additionOfNumbers(int $number1, int $number2, ?Closure $function = null): int
{
    $result = $number1 * $number2;

    if (!is_null($function)) {
        $function($result);
    }

    return $result;
}

$a = 5;
$b = 2;
$c = 7;

$result1 = additionOfNumbers($a, $b);

echo $result1 . PHP_EOL;

$result2 = additionOfNumbers($a, $c, $anonFunction);

echo $result2 . PHP_EOL;

