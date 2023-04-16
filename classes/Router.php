<?php

class Router 
{
    private $routes = [];

    public function get($route, $handler): void
    {
        $this->routes[$route] = $handler;
    }

    public function dispatch(): void
    {
        $path = $_SERVER['PATH_INFO'] ?? '/';
        $handler = $this->routes[$path] ?? null;

        if ($handler !== null) {
            call_user_func($handler);
        } else {

            echo "404 Not Found";
        }
    }
}
