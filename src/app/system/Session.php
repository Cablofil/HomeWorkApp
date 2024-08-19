<?php

class Session
{
    public static function set(string $key, mixed $value): void
    {
        $_SESSION[$key] = $value;
    }

    public static function get(string $key): mixed
    {
        return $_SESSION[$key] ?? null;
    }

    public static function delete(string $key): void
    {
        unset($_SESSION[$key]);
    }

    public static function deleteValidationError(string $key): void
    {
        unset($_SESSION['validation_errors'][$key]);
    }
}