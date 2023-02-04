<?php
require_once __DIR__ .'/vendor/autoload.php';

use app\engine\WebApp;
use app\model\Database;

$app = new WebApp(__DIR__, "config.json");

$user = WebApp::$userQueryRepository::getUserById(2);

WebApp::$logger::writeMessage("Elso uzenet");
WebApp::$logger::writeMessage("Masodik uzenet");
WebApp::$logger::writeMessage("Harmadik uzenet");

echo $user->getName();
