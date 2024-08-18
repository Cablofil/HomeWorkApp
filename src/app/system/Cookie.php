<?php

class Cookie
{
     public static function set(string $name, string $value, int $expire = 0): void
     {
         setcookie($name, $value, $expire);
     }

     public static function get(string $name, ?string $default = null)
     {
         return $_COOKIE[$name] ?? $default;
     }
}