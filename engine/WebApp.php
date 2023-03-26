<?php
namespace app\engine;

use app\model\Database;
use app\model\QueryRepository;
use \eftec\bladeone\BladeOne;


class WebApp {
    private static bool $instanceExist = false;
    private static WebApp $instance;
    public Router $router;
    public \PDO $pdo;
    public Logger $logger;
    public QueryRepository $queryRepository;
    public Request $request;
    public PropertyHandler $propertyHandler;
    public BladeOne $bladeOne;
    private $appConfig;
    const BLADE_ONE_MODE = BladeOne::MODE_DEBUG;


    private function __construct() {
            $this->router = new Router();

            $config = new Config();
            $this->appConfig = $config->getConfig();

            $db = new Database();
            $this->pdo = $db->getPdo();

            $this->logger = new Logger();

            $this->queryRepository = new QueryRepository();

            $this->request = new Request();

            $this->propertyHandler = new PropertyHandler();

            $views = dirname(__DIR__, 1) . '/views';
            $cache = dirname(__DIR__, 1) . '/cache';
            $this->bladeOne = new BladeOne($views, $cache, self::BLADE_ONE_MODE);
    }

    public static function getInstance(): ?WebApp {
        if (!self::$instanceExist) {
            self::$instanceExist = true;
            self::$instance = new WebApp();
            return self::$instance;
        }
        return self::$instance;
    }

    public function run() {
        $this->router->resolve();
    }

    /**
     * @return mixed
     */
    public function getAppConfig()
    {
        return $this->appConfig;
    }

    /**
     * @return mixed
     */
}
