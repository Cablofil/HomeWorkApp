<?php

class Request
{
    public static function method(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public static function url(): string
    {
        return $_SERVER['REQUEST_URI'];
    }

    public static function referer(): string
    {
        return $_SERVER['HTTP_REFERER'];
    }
}