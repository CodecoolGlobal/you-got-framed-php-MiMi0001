<?php

namespace app\engine;

class Config
{
    private string $configFileName;
    const CONFIG_FILE_NAME = "config.json";

    public function __construct()
    {
    }

    public function getConfig() {
        $baseDir = dirname(__DIR__, 1);
        $jsonString = file_get_contents("$baseDir/".self::CONFIG_FILE_NAME);
        return json_decode($jsonString, true);
    }

    public static function getConfigStat() {
        $baseDir = dirname(__DIR__, 1);
        $jsonString = file_get_contents("$baseDir/".self::CONFIG_FILE_NAME);
        return json_decode($jsonString, true);
    }
}
