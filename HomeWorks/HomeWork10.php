<?php

/**
 * @param int $lessThan
 * @return Generator
 */
function fibonacciSequenceGenerator(int $lessThan): Generator
{
    $f1 = 1;
    $f2 = 0;

    if ($lessThan > 0) {
        while ($f2 < $lessThan) {
            $f3 = $f1 + $f2;
            $f1 = $f2;
            yield $f2;
            $f2 = $f3;
        }
    }
}

$fibonacciSequence = fibonacciSequenceGenerator(70);

foreach ($fibonacciSequence as $value) {
    echo $value . PHP_EOL;
}


