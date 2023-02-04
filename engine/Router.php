<?php
namespace app\engine;

class Router {
    protected array $routes=[];

    public function get($path, $viewFileName){
        $this->routes["GET"][$path] = $viewFileName;
    }

    public function addRoute($path, $method, $action) {
        $this->routes[strtoupper($method)][$path] = $action;
    }

    public function resolve() {
        $path = Globals::getRequestPath();
        $method = Globals::getRequestMethod();

        if (isset( $this->routes[$method][$path])) {
            $action = $this->routes[$method][$path];
            if (is_string($action)) $this->render($action);
            else call_user_func($action);
        }
        else {
            http_response_code(404);
            echo "Route not found!";
        }

//        $url_exploded = explode("?", $url);
//        if (count($url_exploded)>1){
//            $path = $url_exploded[0];
//        }
//        else $path = $url;

    }

    public function render($viewFileName) {
        $baseDirectory = WebApp::getBaseDirectory();
        include_once "$baseDirectory/view/$viewFileName";   // Ez így miért működik include-al return helyett?
    }
}
