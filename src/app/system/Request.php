<?php

class Request
{
    public static function method(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public static function url(): string
    {
        $url = $_SERVER['REQUEST_URI'];

        $pos = strpos($url, '?');
        if ($pos !== false) {
            $url = substr($url, 0, $pos);
        }

        return $url;
    }

    public static function referer(): string
    {
        return $_SERVER['HTTP_REFERER'];
    }

    public static function queryString(): string
    {
        return $_SERVER['QUERY_STRING'];            // TODO: Add query
    }

    public static function get(string $key, string $mode = 'string'): mixed
    {
        $data = self::getData();
        $value = $data[$key] ?? null;

        if ($value !== null) {

            if ($mode === 'int') {
                $value = intval($value);
            } elseif ($mode === 'float') {
                $value = floatval($value);
            }

            $value = preg_replace("/<script.*?<\/script>/", '', $value);
            $value = htmlspecialchars($value);
//            $string = filter_var($string, FILTER_SANITIZE_ADD_SLASHES);
        }

        return $value;
    }

    public static function getData(): array
    {
        $data = [];
        if (self::method() === 'POST') {
            $data = $_POST;
        } elseif (self::method() === 'GET') {
            $data = $_GET;
        }

        return $data;
    }

}