<?php

namespace system;

trait AuthValidator
{
    protected array $errors = [];
    protected function validate(array $data, array $rules)
    {
        foreach ($rules as $field => $ruleArray) {
            foreach ($ruleArray as $rule) {

                // required check
                if ($rule === 'required') {
                    if ($this->requiredRule($field, $data) === false) {
                        $this->errors[$field][] = $this->getErrorMessage($rule, $field);
                    }
                } elseif ($rule === 'email') {
                    if ($this->emailRule($field, $data) === false) {
                        $this->errors[$field][] = $this->getErrorMessage($rule, $field);
                    }
                } elseif (str_contains($rule, 'min:')) {
                    [$ruleName, $number] = $this->parseRuleNumber($rule);
                    if ($this->minRule($field, $number, $data) === false) {
                        $this->errors[$field][] = $this->getErrorMessage($ruleName, $field, $number);
                    }
                }
            }
        }
    }

    private function parseRuleNumber(string $rule): array
    {
        return explode(':', $rule);
    }
    protected function minRule(string $field, int $number, array $data): bool
    {
        if (!isset($data[$field]) || strlen($data[$field]) < $number) {
            return false;
        }
        return true;
    }

    protected function requiredRule(string $field, array $data): bool
    {
        if (empty($data[$field])) {
            return false;
        }
        return true;
    }

    protected function emailRule(string $field, array $data): bool
    {
        if (filter_var($data[$field] ?? '' , FILTER_VALIDATE_EMAIL) === false) {
            return false;
        }
        return true;
    }

    protected function errors(): array
    {
        return [
            'required' => "Field %s is required",
            'email' => "Field %s must be a valid email address",
            'min' => "Field %s should be at least %d characters",
            'max' => "Field %s should be less than %d characters",
            'confirmed' => "Field %s does not match confirmation",
        ];
    }

    protected function getErrorMessage(string $rule, ...$fields): string
    {
        $errorsText = $this->errors();
        return sprintf($errorsText[$rule], ...$fields);
    }

}