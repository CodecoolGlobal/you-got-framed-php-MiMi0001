<?php

require_once __DIR__ .'/vendor/autoload.php';

use app\engine\WebApp;
use app\model\Database;

    $app = new WebApp(__DIR__, "config.json");

    $user = WebApp::$userQueryRepository::getUserById(8);
    $name = $user->getName();
    echo "User's name: $name <br>";

    $email = WebApp::$userQuery::getST(8, "email");
    echo "User's email address: $email <br>";

    WebApp::$logger::writeMessage("Elso WebUzenet");
    WebApp::$logger::writeMessage("Masodik WebUzenet");
    WebApp::$logger::writeMessage("Harmadik WebUzenet");

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
