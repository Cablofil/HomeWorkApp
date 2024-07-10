<?php

$boolType = false;

$stringType1 = 'string';
$stringType2 = '0';

$integerType1 = 58;
$integerType2 = 0;

$nullType = null;

$floatType1 = 58.0;
$floatType2 = 58.4;
$floatType3 = 58.5;

echo "Compere to bool(false) below" . PHP_EOL;
var_dump($boolType === $stringType2);
var_dump($boolType == $nullType);
var_dump($boolType === $nullType);
var_dump($boolType == $stringType2 );
echo "-------------------------------------------------" . PHP_EOL;

echo "Compere to string below" . PHP_EOL;
var_dump($stringType1 === $stringType2);
var_dump((bool)$stringType1 == (int)$stringType2);
var_dump((bool)$stringType2 === $boolType);
echo "-------------------------------------------------" . PHP_EOL;

echo "Compere to integer below" . PHP_EOL;
var_dump($integerType1 == $floatType1);
var_dump($integerType1 === $floatType1);
var_dump($integerType1 === intval($floatType1));
var_dump($integerType2 === (int)$stringType2);
echo "-------------------------------------------------" . PHP_EOL;

echo "Compere to null below" . PHP_EOL;
var_dump($nullType < $stringType1);
var_dump((bool)$nullType === $boolType);
var_dump((string)$nullType == $stringType2);
echo "-------------------------------------------------" . PHP_EOL;

echo "Compere to float below" . PHP_EOL;
var_dump($floatType2 > $integerType1);
var_dump((int)$floatType2 > $integerType1);
var_dump($floatType3 >= $integerType1);





