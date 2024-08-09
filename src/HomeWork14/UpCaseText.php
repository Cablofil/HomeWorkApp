<?php

require_once './DefaultText.php';

class UpCaseText extends DefaultText
{
    public function print(): void
    {
        echo strtoupper($this->text) . PHP_EOL;
    }
}