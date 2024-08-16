<?php

Trait ValidationTrait
{

    /**
     * @param string $name
     * @return void
     * @throws Exception
     */
    public static function validateName(string $name): void
    {
        $invalidCharacters = ['!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '_',];

        foreach ($invalidCharacters as $character) {
            if (str_contains($name, $character)) {
                throw new Exception("The name '$name' is invalid. $character is invalid character");
            }
        }
    }

    /**
     * @param float $price
     * @return void
     * @throws Exception
     */
    public function validatePrice(float $price): void
    {
        if ($price <= 0) {
            throw new Exception("Price should be greater than 0");
        }
    }

    /**
     * @param string $selectedDate
     * @return void
     * @throws Exception
     */
    public function validateProductionDate(string $selectedDate): void
    {
        $dateNow = new DateTime();

        $selectedDate = new DateTime($selectedDate);

        if ($dateNow < $selectedDate) {
            throw new Exception("Production date can't be in future");
        }
    }

}