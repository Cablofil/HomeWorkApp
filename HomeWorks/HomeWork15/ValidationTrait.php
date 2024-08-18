<?php

trait ValidationTrait
{
    /**
     * @param float ...$values
     * @return void
     * @throws Exception
     */
    public function validateGreaterThenZero(float ...$values): void
    {
        foreach ($values as $value) {
            if ($value <= 0) {
//                $valueName = $this->getVariableName($value);
//                throw new Exception('Value of' . $valueName . 'must be greater than 0, given' . $value);
                throw new Exception("Value must be greater than 0, $value given");
            }
        }
    }

//    /**
//     * @param $var
//     * @param array|null $context
//     * @return string|null
//     */
//    public function getVariableName($var, array $context = null): string|null  // TODO: fix variable access
//    {
//        $context = $context ?: $GLOBALS;
//        $varName = array_search($var, $context, true);
//        return $varName !== false ? $varName : null;
//    }
}