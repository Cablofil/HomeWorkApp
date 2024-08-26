<?php

trait Validator
{
    /**
     * @param string $name
     * @return void
     * @throws Exception
     */
    public function validateName(string $name): void
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

    /**
     * @param string $string
     * @param int $maxLength
     * @param int $minLength
     * @param bool $crop
     * @return string
     * @throws Exception
     */
    public function validateString(string &$string, int $minLength, int $maxLength, bool $crop = false): string
    {
        $length = strlen($string);
        if ($length > $maxLength && $length < $minLength && $crop === false) {
            throw new Exception("String length must be between $minLength and $maxLength characters");
        }
            $string = substr($string, 0, $maxLength);

        return $string;
    }

    /**
     * @param int $id
     * @return void
     * @throws Exception
     */
    protected function idValidator(int $id): void
    {
        if (!is_numeric($id)) {
            throw new Exception("ID must be a number");
        }
    }
}