<?php

namespace app\engine;

class Logger
{
    private static $logFile;
    public function __construct(string $configFileName)
    {
        $json = $this->getConfigFile($configFileName);
        $logFileName = $json["logfile"];
        $baseDir = WebApp::getBaseDirectory();

        self::$logFile = fopen("$baseDir/$logFileName", 'a');
    }

    public function __destruct(){
        fclose(self::$logFile);
        echo "\nLog file closed.";
    }

    public static function writeMessage(string $message){
        $timestamp = date('Y/m/d h:i:s', time());
        $log = "<Timestamp: $timestamp> <Log: $message>\n";
        fwrite(self::$logFile, $log);
    }

    private function getConfigFile(string $configFileName) {
        $baseDir = WebApp::getBaseDirectory();
        $jsonString = file_get_contents("$baseDir/$configFileName");
        $json = json_decode($jsonString, true);
        return $json;
    }

}
