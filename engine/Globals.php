<?php

namespace app\engine;

class Globals
{
    public static function getRequestPath(): string {
        $url = $_SERVER["REQUEST_URI"];
        $parsed_url = parse_url($url);
        return $parsed_url["path"];
    }

    public static function getRequestMethod(): string {
        return strtoupper($_SERVER["REQUEST_METHOD"]);
    }

}