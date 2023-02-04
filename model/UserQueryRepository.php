<?php

namespace app\model;

use app\engine\WebApp;

class UserQueryRepository implements UserQueryRepositoryInterface
{
    static function getUserById(int $id): ?User
    {
        $query = "SELECT * FROM users WHERE id=:id;";
        $statement = WebApp::$pdo->prepare($query);
        $statement->execute(["id" => $id]);
        $result = $statement->fetch(\PDO::FETCH_ASSOC);

        if ($statement->rowCount()>0) {
            $id = $result["id"];
            $name = $result["name"];
            $email = $result["email"];

            return new User($id, $name, $email);
        }
        else return null;
    }

    static function getAllUsers(): array
    {
        $query = "SELECT * FROM users";
        $statement = WebApp::$pdo->query($query);
        $statement->execute();
        $users = $statement->fetchAll(\PDO::FETCH_ASSOC);

        $result = array();
        foreach ($users as $user) {
            $id = $user["id"];
            $name = $user["name"];
            $email = $user["email"];
            $add_user = new User($id, $name, $email);
            $result[$id] = $add_user;
        }

        return $result;
    }

    static function addNewUser($name, $email): int
    {
        $query = "INSERT INTO users (name, email) VALUES (:name, :email);";
        $statement = WebApp::$pdo->prepare($query);
        $statement->execute(["name" => $name, "email" => $email]);

        return WebApp::$pdo->lastInsertId();
    }

    static function updateUser($id, $columnName, $newValue)
    {
        $query = "UPDATE users SET :column=:value WHERE id=:id;";
        $statement = WebApp::$pdo->prepare($query);
        $statement->execute(["column" => $columnName, "value" => $newValue, "id" => $id]);
    }

    static function getUserColumnValue($id, $columnName)
    {
        $query = "SELECT :column FROM users WHERE id=:id;";
        $statement = WebApp::$pdo->prepare($query);
        $statement->execute(['column' => $columnName, 'id' => $id]);
        $result = $statement->fetch(\PDO::FETCH_ASSOC);
        if ($statement->rowCount() > 0) return $result[$columnName];
        return null;
    }
}