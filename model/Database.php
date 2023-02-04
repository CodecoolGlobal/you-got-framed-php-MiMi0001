<?php
namespace app\model;

use app\engine\WebApp;

class Database
{
    public static \PDO $pdo;

    public function __construct(string $configFileName) {
        $json = $this->getConfigFile($configFileName);

        $host = $json["database"]["host"];
        $dbname = $json["database"]["dbname"];
        $user = $json["database"]["user"];
        $password = $json["database"]["password"];

        $dsn = "mysql:host=" . $host . ";dbname=" . $dbname;
        self::$pdo = new \PDO($dsn, $user, $password);
        self::$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    private function getConfigFile(string $configFileName) {
        $baseDir = WebApp::getBaseDirectory();
        $jsonString = file_get_contents($configFileName);
        $json = json_decode($jsonString, true);
        return $json;
    }

//    public static function pdo(){
//        $baseDir = WebApp::getBaseDirectory();
//        $jsonString = file_get_contents("$baseDir/config.json");
//        $json = json_decode($jsonString, true);
//
//        $host = $json["database"]["host"];
//        $dbname = $json["database"]["dbname"];
//        $user = $json["database"]["user"];
//        $password = $json["database"]["password"];
//
//        $dsn = "mysql:host=" . $host . ";dbname=" . $dbname;
//        return new \PDO($dsn, $user, $password);
//    }
}
