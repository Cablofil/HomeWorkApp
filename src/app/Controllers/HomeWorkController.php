<?php

class HomeWorkController
{
    use CalculatorValidator;

    /**
     * @return void
     */
    public function index(): void
    {
        echo 'Hello World!';
    }

    /**
     * @return void
     */
    public function calculator(): void
    {
        require_once APP_DIR . 'views/calculator.php';
    }

    /**
     * @return void
     * @throws Exception
     */
    public function calculate(): void
    {
        $number1 = (int)$_POST['number1'];
        $number2 = (int)$_POST['number2'];

        $this->validateNumbers($number1, $number2);

        $action = $_POST['action'];

        $this->validateAction($action);

        Calculator::calculate($number1, $number2, $action);
    }

}