<?php

//echo 'php:8.3-apache image, running from src/index.php file' . PHP_EOL;

/**
 * Для введення значень в консоль обрав формат діалогу  для обчислення загального та середнього віку родини з трьох або двох членів (юзер, дружина, та третій член сім'ї)
 * При вооді віку використав приведення до integer та перевірку відповідності певному віку для продовження,
 * і "заглушку" в разі, якщо менше, або введено строку.
 * В питанні про дружину використав перевірку на відповідність значенню і типу, та заглушку для негативного кейсу.
 * В кінці якщо ввести вік, відбувається захардкоджений розрахунок на 3
 * і відповідно на 2 членів в родини, при відповіді "no" іншого строчного значення, або "0", захардкодив розрахунок на двох.
 *
 */

echo "Hello! I am here to calculate your total and average family age. \nWhat is your name? \n";
$userName = trim(fgets(STDIN));

echo "Hello " . $userName . "\n" . "How old are you (please type only full years count)? \n";

$userAge = (int)fgets(STDIN);

if($userAge >= 18) {
    echo "Are you married (please type yes or no)? \n";
} else {
    echo "You are too young, come back when you turn 18. Goodbye ;) \n";
}

$userMarried = trim(fgets(STDIN));

if($userMarried === "yes") {
    echo "How old is your wife (please type only full years count)? \n";
} else {
    echo "Dont worry come back when you get married. Goodbye! \n";
}

$userWifeAge = (int)trim(fgets(STDIN));

echo "Do you have any or third family member or pet? Please type full years count or just no, so I can calculate your total and average family age \n";

$userThirdFamilyMember = trim(fgets(STDIN));

$totalFamilyAge = null;
$averageFamilyAge = null;

if (!intval($userThirdFamilyMember)) {
    $totalFamilyAge = $userAge + $userWifeAge;
    $averageFamilyAge = $totalFamilyAge / 2;
} else {
    $totalFamilyAge = $userAge + $userWifeAge + (int)$userThirdFamilyMember ;
    $averageFamilyAge = $totalFamilyAge / 3;
}

echo "Your total family age is " . $totalFamilyAge . " and average is " . $averageFamilyAge . "\n";


