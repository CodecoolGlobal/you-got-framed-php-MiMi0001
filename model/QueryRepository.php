<?php

namespace app\model;

use app\engine\WebApp;
use app\engine\PropertyHandler;

if (file_exists("../engine/WebApp.php"))
{
    include_once "../engine/WebApp.php";
}


class QueryRepository
{
    public function Register($userData)
    {
        $query = "INSERT INTO registered_user(email, password_hash) VALUES(:email, :password);";
        $statement = WebApp::getInstance()->pdo->prepare($query);
        $statement->execute(['email' => $userData['usrEmail'], 'password' => $userData['usrPassword']]);

    }
}
