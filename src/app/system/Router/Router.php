<?php

class Router
{
    private static array $routes = [];


    public static function set(HttpMethod $method, string $url, array $controllerAction)
    {
        self::$routes[$url][$method->value] = $controllerAction;
    }

    public static function get(string $url, array $controllerAction)
    {
        self::set(HttpMethod::GET, $url, $controllerAction);
    }

    public static function post(string $url, array $controllerAction)
    {
        self::set(HttpMethod::POST, $url, $controllerAction);
    }

    public static function process(HttpMethod $method, string $url)
    {
        $controllerAction = self::$routes[$url][$method->value] ?? null;

        if ($controllerAction === null) {
            header("HTTP/1.0 404 Not Found");
            //todo include view
            echo "<h1 style='color: blue;'>404 Not Found</h1>";
            exit;
        }

        [$controller, $action] = $controllerAction;
        if ($controller === null || $action === null) {
            throw new Exception('Controller and Action are required for route');
        }

        $controllerPath = CONTROLLER_DIR . $controller . '.php';
        if (!file_exists($controllerPath)) {
            throw new Exception('Controller file does not exist');
        }

        require_once $controllerPath;

        $controller = new $controller();
        $controller->$action();
    }
}