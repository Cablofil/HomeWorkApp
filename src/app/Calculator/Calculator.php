<?php

class Calculator
{
    public static function calculate(float $number1, float $number2, string $action): void
    {
       $result = match ($action) {
            '+' => $number1 + $number2,
//            '-' => $number1 - $number2,
//            '*' => $number1 * $number2,
//            '/' => $number1 / $number2,
        };

       echo $result;
    }

}