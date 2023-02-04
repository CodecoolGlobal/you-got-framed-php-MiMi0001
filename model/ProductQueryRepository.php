<?php

namespace app\model;

use app\engine\WebApp;

class ProductQueryRepository implements ProductQueryRepositoryInterface
{

    static function getProductById(int $id): ?Product
    {
        $query = "SELECT * FROM products WHERE id=:id;";
        $statement = WebApp::$pdo->prepare($query);
        $statement->execute(["id" => $id]);
        $result = $statement->fetch(\PDO::FETCH_ASSOC);

        if ($statement->rowCount()>0) {
            $id = $result["id"];
            $name = $result["name"];
            $price = $result["price"];

            return new Product($id, $name, $price);
        }
        else return null;
    }

    static function getAllProducts(): array
    {
        $query = "SELECT * FROM products";
        $statement = WebApp::$pdo->query($query);
        $statement->execute();
        $products = $statement->fetchAll(\PDO::FETCH_ASSOC);

        $result = array();
        foreach ($products as $product) {
            $id = $product["id"];
            $name = $product["name"];
            $email = $product["email"];
            $add_product = new Product($id, $name, $email);
            $result[$id] = $add_product;
        }

        return $result;
    }

    static function addNewProduct($name, $price): int
    {
        $query = "INSERT INTO products (name, price) VALUES (:name, :price);";
        $statement = WebApp::$pdo->prepare($query);
        $statement->execute(["name" => $name, "price" => $price]);

        return WebApp::$pdo->lastInsertId();
    }

    static function updateProduct($id, $columnName, $newValue)
    {
        $query = "UPDATE products SET :column=:value WHERE id=:id;";
        $statement = WebApp::$pdo->prepare($query);
        $statement->execute(["column" => $columnName, "value" => $newValue, "id" => $id]);
    }

    static function getProductColumnValue($id, $columnName)
    {
        $query = "SELECT :column FROM products WHERE id=:id;";
        $statement = WebApp::$pdo->prepare($query);
        $statement->execute(['column' => $columnName, 'id' => $id]);
        $result = $statement->fetch(\PDO::FETCH_ASSOC);
        if ($statement->rowCount() > 0) return $result[$columnName];
        return null;
    }
}
