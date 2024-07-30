<?php

/**
 * @return string
 */
function readConsoleInput(): string
{
    $input = trim(fgets(STDIN)) . PHP_EOL;

    return $input;
}