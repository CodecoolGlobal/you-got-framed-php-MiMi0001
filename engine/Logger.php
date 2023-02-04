<?php

namespace app\engine;

class Logger
{
    private static $logFile;
    public function __construct()
    {
        $logFileName = WebApp::$appConfig["logfile"];
        $baseDir = WebApp::$baseDirectory;

        self::$logFile = fopen("$baseDir/$logFileName", 'a');
    }

    public function __destruct(){
        fclose(self::$logFile);
        echo "\nLog file closed.";
    }

    public static function writeMessage(string $message){
        $timestamp = date('Y/m/d h:i:s', time());
        $log = "<Timestamp: $timestamp> <Log: $message>\n";
        $res = fwrite(self::$logFile, $log, strlen($log));
    }
}
