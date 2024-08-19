<?php

class HomeWorkController
{

    public function index()
    {
        echo 'Hello World!';
    }

    public function calculator()
    {
        require_once APP_DIR . 'views/calculator.php';
    }

    public function calculate()
    {
        $number1 = $_POST['number1'];
        $number2 = $_POST['number2'];
        $action = $_POST['action'];

        Calculator::calculate($number1, $number2, $action);
    }

}