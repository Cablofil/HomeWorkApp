<?php

/**
 * @return string
 */
function readConsoleInput(): string
{
    $input = consoleInput . phptrim(fgets(STDIN)) . PHP_EOL;

    return $input;
}