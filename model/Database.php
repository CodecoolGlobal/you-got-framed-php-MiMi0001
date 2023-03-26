<?php
namespace app\model;

use app\engine\Config;

class Database
{
    public \PDO $pdo;

    public function __construct() {
        $host = Config::getConfigStat()["database"]["host"];
        $dbname = Config::getConfigStat()["database"]["dbname"];
        $user = Config::getConfigStat()["database"]["user"];
        $password = Config::getConfigStat()["database"]["password"];

        $dsn = "mysql:host=" . $host . ";dbname=" . $dbname;
        $this->pdo = new \PDO($dsn, $user, $password);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    /**
     * @return \PDO
     */
    public function getPdo(): \PDO
    {
        return $this->pdo;
    }
}
