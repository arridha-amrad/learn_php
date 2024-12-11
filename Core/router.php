<?php

namespace Core;

class Router
{
    public $routes = [];

    public function get($uri, $controller)
    {
        $this->routes[] = $this->set_route($uri, $controller, "GET");
    }

    public function post($uri, $controller)
    {
        $this->routes[] = $this->set_route($uri, $controller, "POST");
    }

    public function delete($uri, $controller)
    {
        $this->routes[] = $this->set_route($uri, $controller, "DELETE");
    }

    public function put($uri, $controller)
    {
        $this->routes[] = $this->set_route($uri, $controller, "PUT");
    }

    public function patch($uri, $controller)
    {
        $this->routes[] = $this->set_route($uri, $controller, "PATCH");
    }

    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route["method"] === strtoupper($method)) {
                return require base_path($route["controller"]);
            }
        }
        $this->abort();
    }

    public function abort($code = Response::NOT_FOUND)
    {
        http_response_code($code);
        require base_path("views/{$code}.php");
        die();
    }

    private function set_route($uri, $controller, $method)
    {
        return [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method
        ];
    }
}
