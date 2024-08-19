<?php

function url(string $path): string
{
    return APP_URL . $path;
}

function showValidationError(string $key): void
{
    $errors = Session::get('validation_errors');
    if (isset($errors[$key])) {
        $html = "<div style='color: red;'>" . implode(',<br>', $errors[$key]) . "</div>";
        Session::deleteValidationError($key);
        echo $html;
    }
}