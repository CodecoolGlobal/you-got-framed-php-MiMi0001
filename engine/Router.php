<?php

namespace app\engine;


class Router
{
    protected array $routes = [];

    public function addRoute($path, $method, $action, $variables)
    {
        $this->routes[strtoupper($method)][$path] = array($action, $variables);
    }

    public function resolve()
    {
        $appInstance = WebApp::getInstance();
        $path = $appInstance->request->getPath();
        $method = $appInstance->request->getMethod();

        if (isset($this->routes[$method][$path])) {
            $action = $this->routes[$method][$path][0];
            $variables = $this->routes[$method][$path][1];
            if (is_string($action)) $this->render($action, $variables);
            else {
                $action[0] = new $action[0]();
                call_user_func($action);
            }
        } else {
            http_response_code(404);
            echo "Route not found!";
        }
    }

    public function render($template, $variables)
    {
        try {
            echo WebApp::getInstance()->bladeOne->run($template, $variables);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
