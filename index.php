<?php

require_once __DIR__ .'/vendor/autoload.php';

use app\engine\WebApp;
use app\model\Database;

    $app = new WebApp(__DIR__, "config.json");

    $user = WebApp::$userQueryRepository::getUserById(2);
    $name = $user->getName();
    echo "User's name: $name <br>";

    $app->router->addRoute('/', "get", function (){
        echo "Anonym function from index.php";
    });

    $app->router->addRoute('/youGotFramed/', "get", function (){
        echo "Anonym function from index.php";
    });

    $app->router->addRoute('/teszt', "get", "teszt.php");

    $app->router->addRoute('/login', "post", function () {
        echo "Handle from data here!";
    });

    $app->run();