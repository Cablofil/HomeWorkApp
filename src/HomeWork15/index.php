<?php

require_once './ValidationTrait.php';
require_once './Figure.php';
require_once './Circle.php';
require_once './Rectangle.php';

try {

    $circle = new Circle(15);
    $rectangle = new Rectangle(5, 15);

     $rectangle->getPerimeter();

     echo "<pre>";
     $rectangle->getArea();

     echo "<pre>";
     $circle->getArea();

     echo "<pre>";
     $circle->getPerimeter();


} catch (Exception $exception) {

    echo $exception->getMessage() . PHP_EOL;
    exit;
}


