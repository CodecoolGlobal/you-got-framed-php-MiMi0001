<?php

namespace app\engine;

class Config
{
    private static string $configFileName;

    public function __construct(string $configFileName)
    {
        self::$configFileName = $configFileName;
    }

    public static function getConfig() {
        $baseDir = WebApp::getBaseDirectory();
        $configFileName = self::$configFileName;
        $jsonString = file_get_contents("$baseDir/$configFileName");
        return json_decode($jsonString, true);
    }
}
