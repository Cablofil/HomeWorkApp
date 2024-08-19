<?php

trait CalculatorValidator
{
    /**
     * @param float ...$numbers
     * @return void
     * @throws Exception
     */
    public function validateNumbers(float ...$numbers): void
    {
        foreach ($numbers as $number) {
            if (!$number) {
                throw new Exception('Arguments must be numeric');
            }
        }
    }

    /**
     * @param string $action
     * @return void
     * @throws Exception
     */
    public function validateAction(string $action): void
    {
        $acceptedActions = ['+', '-', '*', '/'];

        if (!in_array($action, $acceptedActions)) {
            throw new Exception('Wrong action');
        }
    }

}