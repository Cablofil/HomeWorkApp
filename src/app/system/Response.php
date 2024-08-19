<?php

class Response
{
    public static function redirect(string $url): never
    {
        header('Location: ' . $url);
        exit;
    }
}