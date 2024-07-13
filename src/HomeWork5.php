<?php
declare(strict_types=1);

$r = 5;

function circleAreaCalculator(float $radius, bool $rounded = false): float
{
    $area = M_PI * pow($radius, 2);
    if ($rounded){
        $area = round($area, 1);
    }
    return $area;
}

$circleArea = circleAreaCalculator($r, true);

echo "Area of circle with radius: $r is: $circleArea"  . PHP_EOL;


$x = 5;
$n = 3;

function toPowerOfExponent(float $number, float $exponent = 2): float
{
    if ($number || $exponent === 1) {
        return $number;
    }

    return $number ** $exponent;
}

$y = toPowerOfExponent($x, $n);
echo $y . PHP_EOL;

function toPowerOfExponentV2(float &$number, float $exponent = 2): void
{
    if ($number || $exponent === 1) {
        $number = $number ** $exponent;
    }
}

$someNumber = 5;

toPowerOfExponentV2($someNumber, $n);
echo $someNumber . PHP_EOL;








// TODO розібратись з функціями округлення, для виведення не округлених значень при $precision >= 4  функції round


//function circleAreaPrecisionCalculator(float $radius, int $piPrecision = 2): float
//{
//    if ($piPrecision === 2) {
//
//        $circleArea = round(M_PI, $piPrecision) * pow($radius, 2);
//
//    } else {
//        $pi = round(M_PI, $piPrecision, 0);
//        echo M_PI . ' \ / ' .  $pi . PHP_EOL;
//
//        $circleArea = $pi * pow($radius, 2);
//    }
//
//    return $circleArea;
//}
//
//$precision = 4;
//
//circleAreaPrecisionCalculator($r, 4);



//echo M_PI . PHP_EOL;
//echo round(M_PI, 3, PHP_ROUND_HALF_ODD) . PHP_EOL;
