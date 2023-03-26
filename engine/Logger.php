<?php

namespace app\engine;

class Logger
{
    private $logFile;
    public function __construct()
    {
        $logFileName = Config::getConfigStat()["logfile"];;
        $baseDir = __DIR__;

        $this->logFile = fopen("$baseDir/$logFileName", 'a');
    }

    public function __destruct(){
        fclose($this->logFile);
    }

    public function writeMessage(string $message){
        $timestamp = date('Y/m/d h:i:s', time());
        $log = "<Timestamp: $timestamp> <Log: $message>\n";
        $res = fwrite($this->logFile, $log, strlen($log));
    }
}
