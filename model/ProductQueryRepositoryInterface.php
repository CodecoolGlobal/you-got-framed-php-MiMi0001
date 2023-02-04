<?php

namespace app\model;

interface ProductQueryRepositoryInterface
{
    static function getProductById(int $id): ?Product;
    static function getAllProducts(): array;
    static function addNewProduct($name, $email): int;
    static function updateProduct($id, $columnName, $newValue);
    static function getProductColumnValue($id, $columnName);
}
