<?php
namespace app\engine;
use app\model\Database;
use app\model\UserQueryRepository;

class WebApp {
    public Router $router;
    public static \PDO $pdo;
    public static Logger $logger;
    public static UserQueryRepository $userQueryRepository;
    public static $appConfig;
    public static string $baseDirectory;

    public function __construct(string $BaseDirectory, string $configFileName) {
        $this->router = new Router();

        self::$baseDirectory = $BaseDirectory;

        $config = new Config($configFileName);
        self::$appConfig = Config::getConfig();

        $db = new Database($configFileName);
        self::$pdo = Database::$pdo;

        self::$logger = new Logger($configFileName);

        self::$userQueryRepository = new UserQueryRepository();;
    }

    public static function getBaseDirectory(): string {
        return self::$baseDirectory;
    }

    public function run() {
        $this->router->resolve();
    }
}
