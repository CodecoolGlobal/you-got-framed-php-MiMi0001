<?php
namespace app\engine;;

class Request
{
    public function get(string $variable)
    {
        if (array_key_exists($_REQUEST, $variable)) {
            return $_REQUEST[$variable];
        }
        return null;
    }

    public function getPath()
    {
        $url = $_SERVER["REQUEST_URI"];
        $parsed_url = parse_url($url);
        return $parsed_url["path"];
    }

    public function getMethod(): string
    {
        return strtoupper($_SERVER['REQUEST_METHOD']);
    }

    public function isGet(): bool
    {
        return $this->getMethod() === 'get';
    }
    public function isPost(): bool
    {
        return $this->getMethod() === 'post';
    }

    public function getBody(): array
    {
        $body = [];
        if ($this->getMethod() === 'get'){
            foreach ($_GET as $key => $value){
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        if ($this->getMethod() === 'post'){
            foreach ($_POST as $key => $value){
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        return $body;
    }

    public function redirect(string $url)
    {
        header("Location:".$url);
    }
}