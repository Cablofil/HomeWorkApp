<?php

class DefaultText
{
    protected string $text;

    public function __construct()
    {
        $this->text = "some text";
    }

    public function print(): void
    {
        echo ucfirst($this->text) . PHP_EOL;
    }
}